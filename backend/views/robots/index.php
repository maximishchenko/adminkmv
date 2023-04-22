<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'ROBOTS.TXT';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="s">
        <code><?= Yii::getAlias($model->filename); ?></code>.

        <?php $form = ActiveForm::begin([
            'id' => 'robots-form'
        ]); ?>

        <?php echo $form->errorSummary($model); ?>

        <?= $form->field($model, 'filecontent', ['template' => '{input} {error}'])
            ->textarea(['rows' => 15, 'id' => 'filecontent']) ?>

    <?php ActiveForm::end(); ?>

</div>
<?= $this->render('//layouts/forms/_buttons', ['formId' => 'robots-form']); ?>