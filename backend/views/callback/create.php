<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Callback $model */

$this->title = Yii::t('app', 'Add new Record');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Callbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callback-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
