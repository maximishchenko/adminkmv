<?php

use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Настройки',
                'text' => 'Управление настройками приложения',
                'linkUrl' => Url::toRoute("/settings"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'warning'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Пользователи',
                'text' => 'Управление пользователями',
                'linkUrl' => Url::toRoute("/users"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-user',
                'theme' => 'danger'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Обратная связь',
                'text' => 'Данные заполненных форм обратной связи',
                'linkUrl' => Url::toRoute("/callback"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-inbox',
                'theme' => 'default'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'Скрипты',
                'text' => 'Подключаемые js-скрипты',
                'linkUrl' => Url::toRoute("/scripts"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-check',
                'theme' => 'primary'
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => 'robots.txt',
                'text' => 'Файл robots.txt',
                'linkUrl' => Url::toRoute("/robots"),
                'linkText' => 'Перейти',
                'icon' => 'fas fa-cog',
                'theme' => 'info'
            ]) ?>
        </div>
    </div>
</div>