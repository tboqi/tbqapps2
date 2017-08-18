<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;

class SiteController extends Controller {
    public function actionIndex() {
        return $this->render('greet');
    }
}