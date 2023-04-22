<?php

/** @var yii\web\View $this */

use frontend\models\Contact;

$this->title = Yii::$app->configManager->getItemValue('seoDefaultTitle');

if (Yii::$app->configManager->getItemValue('loadingAnimation') == true) {
    $this->registerJsFile("js/queryloader2.min.js");
    $this->registerJsFile("js/loader.js");
}
?>

<section class="hero__stage">

<div class="container">
    <div class="hero__stage__first_row">
        <div class="hero__stage__logo slideanim">
            <svg class="logo_main">
                <use xlink:href="img/sprite.svg#logo"></use>
            </svg>
        </div>
        <div class="hero__stage__name slideanim">
            <div class="hero__stage__name__title">
                <?= Yii::$app->configManager->getItemValue('companyName'); ?>
            </div>
            <div class="hero__stage__name__description">
                <?= Yii::t('app', "Hero stage description"); ?>
            </div>
        </div>
        <div class="hero__stage__button slideanim">
            <button target="_blank" class="red__btn btn__long" data-callback-modal>
            <!-- <button target="_blank" class="red__btn btn__long" data-callback-thanks> -->
                <?= Yii::t('app', 'Get service'); ?>
            </button>
        </div>
    </div>
</div>  


    <div class="hero__stage__second_row parallax">
        <div class="hero__stage__title slideanim">
            <?= Yii::t('app', 'Hero stage title'); ?>
        </div>
    </div>


    <div class="hero__stage__third_row">
        <div class="hero__stage__items">
            <div class="hero__stage__item slideanim">
                <div class="hero__stage__item__title">
                    <?= Yii::t('app', 'IT Service Title'); ?>
                </div>
                <div class="hero__stage__item__description">
                    <?= Yii::t('app', 'IT Service Description'); ?>
                </div>
                <div class="hero__stage__item__button">
                    <button target="_blank" class="red__btn btn__long" data-callback-modal>
                        <?= Yii::t('app', 'Get service'); ?>
                    </button>
                </div>
            </div>
            <div class="hero__stage__item slideanim">
                <div class="hero__stage__item__title">
                    <?= Yii::t('app', '1C Development Title'); ?>
                </div>
                <div class="hero__stage__item__description">
                    <?= Yii::t('app', '1C Development Description'); ?>
                </div>
                <div class="hero__stage__item__button">
                    <button target="_blank" class="red__btn btn__long" data-callback-modal>
                        <?= Yii::t('app', 'Get service'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="company__description parallax">

<div class="container">
    <article class="company__description__text slideanim">
        <div class="text__block">
            <h3>
                IT обслуживание компьютеров в городах
                Кавказских Минеральных Вод
            </h3>
            <h4>
                ПОЧЕМУ ЛУЧШЕ ДОВЕРИТЬ РЕМОНТ ТЕХНИКИ НАМ?
            </h4>
            
            <p>
                Восстановление компьютерной техники — процедура требующая предварительной
                подготовки. Отсутствие навыков, инструментов. соответствующего программного софта
                усугубляет поломку и может привести к критическим неисправностям.
            </p>

            <p>
                Представители нашего сервиса готовы провести ремонт оргтехники на дому иди в офисе и в короткий срок реанимировать поврежденную аппаратуру.
                Основными направлениями деятельности являются: построение ИТ-инфраструктуры и профессиональные ИТ-услуги.
            </p>
            <p>
                Глубокое понимание бизнеса клиента, выявление и тщательный анализ причин, препятствующих его развитию, позволяет предложить оптимальные варианты решения наиболее актуальных бизнес-задач и, в рамках каждого проекта, достичь максимального экономического результата для клиента.
            </p>
            <p>
                Наши эксперты постоянно совершенствуют свои знания. Работа каждого из специалистов «Базис» является образцом профессионализма во всех сферах деятельности и видах услуг, которые мы оказываем.
            </p>
            <p>
                С 2001 года учредителями были реализованы множество проектов для организаций финансового сектора, промышленности, девелоперских компаний.
            </p>
            <div class="parallax__contact__button">
                <button target="_blank" class="red__btn btn__long" data-callback-modal>
                    <?= Yii::t('app', 'Get service'); ?>
                </button>
            </div>
        </div>
    </article>
</div>

</section>
<section class="services slideanim">
<div class="container">
    <div class="services__items">
        <div class="services__item slideanim">
            <div class="services__item__image">
                <svg class="img">
                    <use xlink:href="img/sprite.svg#case"></use>
                </svg>
            </div>
            <div class="services__item__title">
                <?= Yii::t('app', 'We finished orders'); ?>
            </div>
            <div class="services__item__description">
                <?= Yii::t('app', 'Any dificulty'); ?>
            </div>
        </div>
        <div class="services__item slideanim">
            <div class="services__item__image">
                <svg class="img">
                    <use xlink:href="img/sprite.svg#speed"></use>
                </svg>
            </div>
            <div class="services__item__title">
                <?= Yii::t('app', 'Fast speed'); ?>
            </div>
            <div class="services__item__description">
                <?= Yii::t('app', 'Orders finishing'); ?>
            </div>
        </div>
    </div>
</div>

</section>
</div>



<script src="https://api-maps.yandex.ru/2.1/?apikey=<?= Yii::$app->configManager->getItemValue('mapApiKey'); ?>&lang=ru_RU" type="text/javascript"></script>
<script src="js/map.js"></script>

<section 
    class="map__block slideanim"
    id="map__block"
    data-coordinates="<?= Yii::$app->configManager->getItemValue('mapCoordinates'); ?>"
    data-map-title="<?= Yii::$app->configManager->getItemValue('companyName'); ?>"
    data-map-body="<?= Yii::$app->configManager->getItemValue('contactPhone'); ?>"
    data-map-footer="<?= Yii::$app->configManager->getItemValue('companyAddress'); ?>"
>

</section>
