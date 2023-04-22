<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Callback $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="callback-form">

    <?php $form = ActiveForm::begin([
        'id' => 'callback-form',
    ]); ?>
    <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
                    'mask' => '+7 (999) 999-99-99',
                ]) ?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->hint(Yii::t('app', 'Not Required')) ?>
                <?= $form->field($model, 'agreement')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'body')->textarea(['rows' => 10]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?= $this->render('//layouts/forms/_buttons', ['formId' => 'callback-form']); ?>