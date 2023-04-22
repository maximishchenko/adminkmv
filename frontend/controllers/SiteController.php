<?php

namespace frontend\controllers;

use frontend\controllers\BaseController;

/**
 * Site controller
 */
class SiteController extends BaseController
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPolicy()
    {
        return $this->render('policy', [
        ]);
    }

    public function actionOffline($name, $message)
    {
        $this->layout = false;
        return $this->render('error', ['name' => $name, 'message' => $message]);
    }
}
