<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Router extends Controller {

    const MSG_IDENTITY_PRE = "localhost";
    const MQSERVER_NAME = "local"; //local-1
    const RESPONSE_IDENTITY = "RESPONSE_IDENTITY";

    public $enableCsrfValidation = false;

    private $errors = [
        '1' => '异步调用成功',
        '00001' => 'businessName不能为空',
        '00002' => 'appKey不能为空',
        '00003' => 'appKey错误',
        '00004' => 'businessName错误',
        '00005' => 'businessName与appKey不匹配',
        '00006' => '消息体不能为空',
        '00100' => '不支持该种请求方式',
        '00300' => '发送消息到MQ失败',
        '00501' => 'Get方式调用接口失败',
        '00502' => 'Get方式调用接口出错',
        '00503' => '调用混合队列出错',
        '00504' => '调用B2C接口出错',
        '00505' => '调用业务系统接口出错',
        '00506' => '调用跨中心路由器失败',
        '00507' => '调用跨中心路由器出错',
        '00600' => '同步调用出错',
    ];

    public function action_index() {
        //检查传入的参数
        $businessName = $this->request->post('businessName') ?: $this->request->query('businessName');
        if (empty($businessName)) {
            return $this->displayJson("00001");
        }
        $query = $this->db->get_where('c_method', array('c_methodName' => $businessName), 1, 0);
        $cMethod = $query->result_array();
        if (empty($cMethod)) {
            return $this->displayJson("00004");
        }
        $methodID = $cMethod[0]['c_methodID'];

        $appKey = $this->request->post('appKey') ?: $this->request->query('appKey');
        if (empty($appKey)) {
            return $this->displayJson("00002");
        }
        $query = $this->db->get_where('client', ['deleteFlag' => 0, 'validFlag' => 1, 'appKey' => $appKey], 1, 0);
        $client = $query->result_array();
        if (empty($client)) {
            return $this->displayJson("00003");
        }
        $methodIDs = explode(',', $client[0]['methodIDs']);

        if (!in_array($methodID, $methodIDs)) {
            return $this->displayJson("00005");
        }

        $syncFlag = $this->request->post('syncFlag') ?: $this->request->query('syncFlag'); //同步调用 0异步调用
        $syncFlag = intval($syncFlag);

        $messageJson = $this->request->post('messageJson') ?: $this->request->query('messageJson');
        $messageJsonTmp = json_decode($messageJson, true);
        if (empty($messageJson) || empty($messageJsonTmp)) {
            return $this->displayJson("00006");
        }
        /*参数检查完毕 */

        $r = $this->sendMsg($messageJson, $appKey, $businessName, $syncFlag);
        $data = [
            'type' => 'sender',
            'message_json' => $messageJson,
            'app_key' => $appKey,
            'business_name' => $businessName,
            'sync_flag' => $syncFlag,
            'server_ip' => $_SERVER['SERVER_ADDR'],
            'return_status' => $r['status'] == "1" ? 'success' : 'failed',
            'return_status_num' => $r['status'],
            'return_message' => $r['message'],
            'return_message_json' => $r['messageJson'],
            'log_time' => date('Y-m-d H:i:s'),
            'is_across_center' => -1,
            'call_url' => '',
        ];
        $this->db->insert('runlog2', $data);

        echo $this->displayJson($r['status'], $r['message'], $r['messageJson']);return;
    }

    private function sendMsg($messageJson, $appKey, $businessName, $syncFlag) {
        $query = $this->db->get_where('queue', array('name' => $businessName), 1, 0);
        $queue = $query->result_array();
        $queue = $queue[0];
        if ($queue['persistentFlag'] == "1") {
            $persistent = "true";
        } else {
            $persistent = "false";
        }
        $sendMessage = [
            'messageJson' => $messageJson,
            'appKey' => $appKey,
            'businessName' => $businessName,
            'syncFlag' => $syncFlag,
        ];
        if ($syncFlag) {
            $query = $this->db->get_where('mqServer', array('name' => self::MQSERVER_NAME), 1, 0);
            $mqServer = $query->result_array();
            $sendMessage['masterServer'] = $mqServer[0]['url'];

            $srcDest = self::MQSERVER_NAME;
            if (strpos($srcDest, '-') > 0) {
                $srcDest = substr($srcDest, strpos($srcDest, '-'));
            }

            $identity = self::MSG_IDENTITY_PRE . "-" . $srcDest . "-" . microtime(true) . '-' . $businessName . '-' . mt_rand(); // + (AppKeys.msgIDIndex++)
            $sendMessage[self::RESPONSE_IDENTITY] = $identity;
        }
        $message = null;
        $messageJson = '';
        $status = '0';
        try {
            $stomp_urls = ['tcp://10.0.75.1:61613', 'tcp://10.0.75.1:11613'];
            $link = null;
            foreach ($stomp_urls as $key => $value) {
                try {
                    $link = new Stomp($value);
                } catch (StompException $e) {
                }
                if ($link) {
                    break;
                }
            }
            if (!$link) {
                return ['status' => '0', 'message' => '连接mq服务器失败', 'messageJson' => ''];
            }

            $result = $link->send('/' . $queue['queueType'] . '/' . $businessName, json_encode($sendMessage), ["persistent" => $persistent, "amq-msg-type" => "text"]); //ack:auto
            if (false === $result) {
                $status = '00300';
            } else {
                $status = "1"; //succeed
                if ($syncFlag) {
                    $link->subscribe('/topic/RESPONSE_TOPIC_NAME');
                    $ctime = time();
                    while (1) {
                        if (true === $link->hasFrame()) {
                            $frame = $link->readFrame();
                            if (false !== $frame) {
                                $frameBody = json_decode($frame->body, true);
                                if ($frameBody['RESPONSE_IDENTITY'] == $identity) {
                                    $link->ack($frame->headers['message-id']);
                                    $status = $frameBody['status'];
                                    $message = $frameBody['message'];
                                    $messageJson = $frameBody['messageJson'];
                                    break;
                                }
                            }
                        }
                        if (time() - $ctime > 20) {
                            //20秒超时
                            $status = '0';
                            $message = '同步调用超时';
                            break;
                        }
                        usleep(10);
                    }
                    $link->unsubscribe('/topic/RESPONSE_TOPIC_NAME');
                }
            }
            // $link->close();
        } catch (StompException $e) {
            $status = "0";
            $message = '发送消息失败: ' . $e->getMessage();
        }
        return ['status' => $status, 'message' => $message, 'messageJson' => $messageJson];
    }

    private function displayJson($status, $message = null, $messageJson = null) {
        if (!$message) {
            $message = $this->errors[$status];
        }

        return json_encode(['status' => $status, 'message' => $message, 'messageJson' => $messageJson]);
    }

}
