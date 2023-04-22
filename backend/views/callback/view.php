<?php

use backend\models\Callback;
use backend\widgets\ViewButtonsWidget;
use common\models\Status;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Callback $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="callback-view">

    <p class="text-right">
        <?= ViewButtonsWidget::widget(['id' => $model->id]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'phone',
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a($data->phone, 'tel:'.$data->phone, []);
                }
            ],
            'email:email',
            'body:ntext',
            [
                'attribute' => 'agreement',
                'format' => 'raw',
                'value' => function($data) {
                    return Callback::getAgreementsArray()[$data->agreement];
                }
            ],
            'created_at:datetime',
        ],
    ]) ?>

</div>
