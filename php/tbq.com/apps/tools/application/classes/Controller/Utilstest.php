<?php
/**
 * 工具測試
 */
class Controller_Utilstest extends Controller {

    public function action_index() {
    }

    public function action_float() {
        $f1 = 7;
        $f2 = 13;
        $v = round($f2 / $f1, 6);
        $v1 = round(1.000001, 4);
        $v2 = round(0.999999999, 4);
        var_dump($v, $v1, $v2);
    }
}
