<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apitest extends CI_Controller {

    public $enableCsrfValidation = false;

    public function yibufeikuaqueue() {
        $paramsJson = $this->input->raw_input_stream;
        $paramsArr = json_decode($paramsJson, 1);
        if ($paramsArr['return'] == 'true') {
            $data = ['return' => true];
            $message = "";
            $status = "1";
        } else {
            $data = ['return' => false];
            $message = "error";
            $status = "-1";
        }

        $r = [
            "message" => $message,
            "messageJson" => json_encode($data),
            "status" => $status,
        ];
        return json_encode($r);
    }
}
