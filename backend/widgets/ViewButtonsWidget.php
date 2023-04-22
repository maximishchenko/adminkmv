<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ViewButtonsWidget extends Widget
{
    public $id;


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        echo Html::a(Yii::t('app', 'To list'), ['index'], ['class' => 'btn btn-success btn-sm']);
        echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $this->id], [
            'class' => 'btn btn-danger btn-sm',
            'style' => "margin-left: 10px",
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]);
    }
}