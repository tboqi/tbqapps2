<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mq extends Controller {

    public function action_index() {
        $url = "http://192.168.3.218:8080/router";
        $post_data = array("businessName" => "tjsuserinfo", "syncFlag" => "1", "appKey" => "101866D8CFSDXKV6", "messageJson" => htmlentities("{\"UserId\":\"df7e6aacd04a4f6b92b5de50492207bb\"}"));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        //打印获得的数据
        print_r($output);
        exit;
        $this->tpl = 'welcome/index';
    }

} // End Welcome
