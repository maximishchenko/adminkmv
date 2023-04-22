<?php

namespace backend\controllers;
use backend\models\Robots;
use yii\filters\AccessControl;
use Yii;

class RobotsController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Robots();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->RobotsWriteFile();
            Yii::$app->session->setFlash('success', 'Файл robots.txt сохранен');
            // return $this->render('index', ['model' => $model]);
            return $this->refresh();
        } else {
            $model->createRobotsFile();
            $model->filecontent = $model->RobotsReadFile();
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

}
