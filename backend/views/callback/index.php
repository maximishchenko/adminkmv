<?php

use backend\models\Callback;
use backend\widgets\LinkColumn;
use backend\widgets\ListButtonsWidget;
use backend\widgets\SetColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\CallbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Callbacks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callback-index">

    <p class="text-right">
        <?= ListButtonsWidget::widget() ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'contentOptions' => ['style' => 'width:100px;'],
            ],
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a($data->name, ['view', 'id' => $data->id], []);
                },
                'contentOptions' => ['class' => 'text-wrap'],
                'headerOptions' => array(
                    'class' => 'sort-numerical',
                ),
            ],
            // 'phone',
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a($data->phone, 'tel:' . $data->phone, []);
                },
            ],
            // 'email:email',
            // 'body:ntext',
            [
                'class' => SetColumn::className(),
                'filter' => Callback::getAgreementsArray(),
                'attribute' => 'agreement',
                'name' => function($data) {
                    return ArrayHelper::getValue(Callback::getAgreementsArray(), $data->agreement);
                },
                'contentOptions' => ['style' => 'width:150px;'],
                'cssCLasses' => [
                    Callback::AGREEMENT_YES => 'success',
                    Callback::AGREEMENT_NO => 'danger',
                ],
            ],
            [
                'attribute' => "created_at",
                'format' => 'datetime',
                'filter' => false,
            ],
            [
                'class' => ActionColumn::className(),
                'contentOptions' => ['style' => 'width:80px;'],
                'template' => '{delete}',
            ],
        ],
    ]); ?>


</div>
