<?php
class Controller_Qianbao extends Controller_Base {
    private $qianbao_pre_url = 'https://10.1.21.213:8888/vipcard';

    public function action_index() {
        $this->tpl = 'qianbao/index';
        $this->data = [];
    }

    public function action_dongjie() {
        $this->tpl = 'qianbao/dongjie';
        $this->data = [];
    }

    public function action_chongzhi() {
        $this->tpl = 'qianbao/chongzhi';
        $this->data = [];
    }

    private function curl_post($data_string) {
        $url = $this->qianbao_pre_url . '/api/wallet.do';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $cacert = getcwd() . '/truststore.jks'; //CA根证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 只信任CA颁布的证书
        //curl_setopt($ch, CURLOPT_CAINFO, $cacert); // CA根证书（用来验证的网站证书是否是CA颁布）
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名，并且是否与提供的主机名匹配

        $result = curl_exec($ch);
        return $result;
    }

    public function action_do_dongjie() {
        $header = $_POST['head'];
        $body_data = $_POST['body'];
        $body_data['sign'] = $this->parse_sign($body_data);
        $data = ['header' => $header, 'body' => $body_data];
        $data_string = json_encode($data);

        $result = $this->curl_post($data_string);
        echo 'postData:<br>' . $data_string . '<hr>';
        echo 'url:<br>' . $url . '<hr>';
        echo 'return data:<br>' . $result . '<hr>';

        exit;
    }
    public function action_do_chongzhi() {
        $header = $_POST['head'];
        $body_data = $_POST['body'];
        $body_data['sign'] = $this->parse_sign($body_data);
        $data = ['header' => $header, 'body' => $body_data];
        $data_string = json_encode($data);
        $result = $this->curl_post($data_string);

        echo 'postData:<br>' . $data_string . '<hr>';
        echo 'url:<br>' . $url . '<hr>';
        echo 'return data:<br>' . $result . '<hr>';

        exit;
    }
    public function action_duizhang() {
        $this->tpl = 'qianbao/duizhang';
        $this->data = [];
    }

    public function action_do_duizhang() {
        $header = $_POST['head'];
        $body_data = $_POST['body'];
        $body_data['sign'] = $this->parse_sign($body_data);
        $data = ['header' => $header, 'body' => $body_data];
        $data_string = json_encode($data);
        $result = $this->curl_post($data_string);

        echo 'postData:<br>' . $data_string . '<hr>';
        echo 'url:<br>' . $url . '<hr>';
        echo 'return data:<br>' . $result . '<hr>';

        exit;
    }

    public function action_tuihuo() {
        $this->tpl = 'qianbao/tuihuo';
        $this->data = [];
    }

    public function action_do_tuihuo() {
        $header = $_POST['head'];
        $body_data = $_POST['body'];
        $body_data['sign'] = $this->parse_sign($body_data);
        $data = ['header' => $header, 'body' => $body_data];
        $data_string = json_encode($data);
        $result = $this->curl_post($data_string);

        echo 'postData:<br>' . $data_string . '<hr>';
        echo 'url:<br>' . $url . '<hr>';
        echo 'return data:<br>' . $result . '<hr>';

        exit;
    }
    function parse_sign($params) {
        $params_tmp = ksort($params);
        $params_str = '';
        foreach ($params as $key => $value) {
            if (empty($value)) {
                continue;
            }
            $params_str .= $key . '=' . $value . '&';
        }
        $params_str .= "key=" . $_POST['key'];
        $signature = md5($params_str);
        return $signature;
    }
}
