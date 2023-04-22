<?php

namespace frontend\controllers;

class ErrorController extends \frontend\controllers\BaseController
{
    public function actionPageNotFound()
    {
        return $this->render('page-not-found');
    }

}
