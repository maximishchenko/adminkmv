<?php

namespace frontend\controllers;

use frontend\controllers\BaseController;
use frontend\models\Contact;
use Yii;

class ContactController extends BaseController
{
    public function actionIndex()
    {
        $model = new Contact();

        if (Yii::$app->request->isAjax) {
            if ($model->load($this->request->post()) && $model->save()) {
                echo "success";
            } else {
                echo "error";
            }
        }
        else {
            echo "not ajax request";
        }
        exit(1);
    }
}