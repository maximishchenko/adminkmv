<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\models\Script;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <?php

    Yii::$app->view->registerMetaTag([
        'name' => 'keywords',
        'content' => Yii::$app->configManager->getItemValue('seoDefaultKeywords'),
    ], $tag);
    Yii::$app->view->registerMetaTag([
        'name' => 'description',
        'content' => Yii::$app->configManager->getItemValue('seoDefaultDescription'),
    ], $tag);

    ?>
    
    <!-- Скрипты перед </head> -->
    <?php Script::getScripts(Script::BEFORE_END_HEAD); ?>
</head>
<body class="page">
<?php $this->beginBody() ?>
<!-- Скрипты после <body> -->
<?php Script::getScripts(Script::AFTER_BEGIN_BODY); ?>

<header class="header">
    <?= $this->render("template/_header"); ?>
</header>

<main role="main">
    <?= $content ?>
    <?= $this->render("template/_scroll_top"); ?>
</main>

<footer class="footer">
    <?= $this->render("template/_footer"); ?>
</footer>

<?= $this->render('template/_modal'); ?>

<!-- Скрипты перед </body> -->
<?php Script::getScripts(Script::BEFORE_END_BODY); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
