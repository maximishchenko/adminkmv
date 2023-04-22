<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    
    public function beforeAction($action)
    {
        $this->redirectToNotFound();
        return parent::beforeAction($action);
    }

    /**
     * Перенаправление на страницу ошибки в случае возврата кода http-состояния 404
     *
     * @return \yii\web\Response|null
     */
    protected function redirectToNotFound()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) && $exception->statusCode === 404) {
            return $this->response->redirect(['/page-not-found'])->send();
        }
    }
}