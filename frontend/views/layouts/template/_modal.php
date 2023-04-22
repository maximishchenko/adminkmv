<?php

use frontend\models\Contact;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$contact = new Contact();
?>

<div class="graph-modal" id="contact_modal">
  <div class="graph-modal__container" role="dialog" aria-modal="true" id="modal_block" data-graph-target="feedback">
    <button class="btn-reset graph-modal__close js-modal-close" aria-label="Закрыть модальное окно">
      <span class="cross"></span>
    </button>
    <div class="graph-modal__content">

      <?php $form = ActiveForm::begin([
        'id' => 'feedback_form_modal',
        'action' => ['/contact'],
        'method' => 'post',
        'options' => [
          'class' => "feedback-form",
          'autocomplete' => 'off',
          'data-modal-form' => '',
        ]
      ]); ?>

      <span class="feedback-form__title">Оставьте свои контакты и мы свяжемся с вами</span>

      <?= $form->field($contact, 'name', [
            'template' => '{input}',
            'options' => [
              'tag' => false
            ]])->textInput([
              'id' => 'transfer__modal-inp-name',
              'autofocus' => true,
              'class' => "input form__input feedback-form__inp",
              'placeholder' => "Ваше имя",
              'type' => 'text',
              'required' => true
          ]); ?>

      <?= $form->field($contact, 'phone', [
        'template' => '{input}', 
        'options' => [
            'tag' => false
        ]
        ])->textInput([
            'id' => "transfer__modal-inp", 'class' => "input-reset feedback-form__inp", 'placeholder' => "Ваш телефон", 'type' => 'tel', 'data-tel-input' => '', 'required' => true
        ]); ?>

      <div class="feedback-form__row">

        <div class="feedback-form__politics">

          <?= $form->field($contact, 'agreement', ['template' => '{input}', 'options' => ['tag' => false]])->checkbox([
                    'id' => 'feedback__checkbox',
                    'class' => 'feedback-form__checkbox feedback-form__checkbox_modal',
                    'data-agreement-checkbox' => '',
              ], false); ?>
          <label for="feedback__checkbox" required>
            Нажимая, вы соглашаетесь на обработку <a class="feedback-form__politic-link politics" href="javascript:void(0);">Персональных
              данных</a>
          </label>
        </div>

        <?= Html::submitButton('Отправить', ['class' => 'btn-reset button-second red__btn btn__long', 'id' => 'callback_submit_btn_modal']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>



  </div>

  <?php // $this->render('//layouts/_thanks'); ?>

  <?php // $this->render('//layouts/_policy'); ?>

</div>
