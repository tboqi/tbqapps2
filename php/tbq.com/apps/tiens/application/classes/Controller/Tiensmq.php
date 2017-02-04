<?php
class Controller_Tiensmq extends Controller_Base {
    private $qianbao_pre_url = 'https://10.1.21.213:8888/vipcard';

    public function action_index() {
        $this->tpl = 'tiensmq/index';
        $this->data = [];
    }

    public function action_do() {
        $header = $_POST['head'];
        $body_data = $_POST['body'];
        $body_data['sign'] = $this->parse_sign($body_data);
        $data = ['header' => $header, 'body' => $body_data];
        $data_string = json_encode($data);
        $url = $this->qianbao_pre_url . '/api/wallet.do';
        $result = $this->curl_post($url, $data_string);

        echo 'postData:<br>' . $data_string . '<hr>';
        echo 'url:<br>' . $url . '<hr>';
        echo 'return data:<br>' . $result . '<hr>';
    }

    private function curl_post($url, $data_string) {
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
}
