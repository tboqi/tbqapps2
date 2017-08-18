<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;

class SiteController extends Controller {
    public function actionIndex() {
        return $this->render('test.tpl', ['test' => 'smarty']);
        // return $this->render('greet');
    }
}