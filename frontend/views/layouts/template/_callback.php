<?php

use backend\models\Callback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$callback = new Callback();
?>


<style>
.modal {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
	z-index: 99999;
	-webkit-transition: opacity 400ms ease-in;
	-moz-transition: opacity 400ms ease-in;
	transition: opacity 400ms ease-in;
	display: none;
	pointer-events: none;
}
.modal:target {
	display: block;
	pointer-events: auto;
}

.modal.active {
	display: block;
	pointer-events: auto;
}

.modal > div {
	width: 25vw;
	position: relative;
	margin: 10% auto;
	padding: 3vw;
	background: #fff;
}
.close {
	color: #FFFFFF;
	line-height: 25px;
	position: absolute;
	right: 0;
	text-align: center;
	top: -40px;
	text-decoration: none;
	font-weight: bold;
}

._close-line:first-child {
    transform: rotate(45deg);
}
._close-line:last-child {
    transform: rotate(-45deg);
}
._close-line {
    width: 2px;
    height: 20px;
    background: #fff;
    position: absolute;
    left: 15px;
    top: 6px;
    display: block;
}
.form__title {
    text-align: center;
}
.form__subtitle {
    color: rgba(68,68,68,1);
    font-size: 18px;
    text-align: center;
    text-align-last: center;
    font-weight: 400;
    text-decoration: none;
    line-height: 150%;
    font-style: normal;
}
.help-block {
    height: 10px;
    max-height: 10px;
}
.has-error .help-block {
    color: #ff0000;
}
.form__field__item {
    margin-bottom: 1.6rem;
}
.form__field__item label {
    color: rgba(68,68,68,1);
    font-size: 16px;
    text-align: left;
    text-align-last: left;
    font-weight: bold;
    text-decoration: none;
    line-height: 100%;
    font-style: normal;
    padding-top: 0px;
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 8px;
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
.agreement__block {
    margin-bottom: 2rem;
}
.red__link {
    color: rgba(237,28,36,1);
}
.form__input {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
    border-color: rgba(68,68,68,1);
    border-style: solid;
    border-width: 0px;
    background-attachment: scroll;
    background-position: 0% 0%;
    background-repeat: no-repeat;
    background-color: rgba(245,245,245,1);
    padding-top: 16px;
    padding-left: 16px;
    padding-bottom: 16px;
    margin-top: 0px;
    margin-left: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    outline: 0;
    width: 100%;
}
.form__input:focus, .form__input:hover, .form__input:focus, .form__input:hover {
    background: linear-gradient(0deg, rgba(31, 80, 161, 0.1),rgba(31, 80, 161, 0.1)),#fff;
    outline: 0;
}
</style>

<div id="openModal" class="modal">
	<div>        
		<a href="#close" title="Закрыть" class="close">
            <span class="_close-line"></span>
            <span class="_close-line"></span>
        </a>
		<h2 class="form__title">
            <?= Yii::t('app', 'Get Me call'); ?>
        </h2>

        <p class="form__subtitle">
            <?= Yii::t('app', 'Please input your contact data'); ?>
        </p>
        
        <?php $form = ActiveForm::begin([
            'id' => 'callback-form',
            'class' => 'callback__form',
            'options' => [
                'autocomplete' => 'off',
            ]
        ]); ?>

        <div class="form__field__item">
            <label for="name">
                <?= Yii::t('app', 'Client Name'); ?>
            </label>
            <?= $form->field($callback, 'name', ['template' => '{input}{error}'])->textInput(['id' => 'name', 'class' => 'form__input']) ?>
            <div class="help-block"></div>
        </div>

        <div class="form__field__item">
            <label for="phone">
                <?= Yii::t('app', 'Client Phone'); ?>
            </label>
            <?= $form->field($callback, 'phone', ['template' => '{input}{error}'])->textInput(['id' => 'phone', 'class' => 'form__input', 'data-tel-input' => '', 'pattern' => "^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{10}$"]) ?>
            <div class="help-block"></div>
        </div>

        <div class="agreement__block">
            Нажимая на кнопку "<?= Yii::t('app', 'Do call order'); ?>", вы принимаете условия <a href="<?= Url::toRoute('/policy'); ?>" class="red__link">соглашения на обработку персональных данных</a> 
        </div>

        <?= Html::submitButton(Yii::t('app', 'Do call order'), ['class' => 'red__btn btn__long']); ?>

        <?php ActiveForm::end(); ?>
	</div>
</div>