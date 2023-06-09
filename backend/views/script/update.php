<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\seo\models\Script */

$this->title = Yii::t('app', 'Script {name}', ['name' => $model->name]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Scripts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
