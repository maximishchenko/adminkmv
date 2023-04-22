<?php

use yii\helpers\Url;
?>

<div class="container">
    <div class="footer__items">
        <div class="footer__copyright">
            &copy; <?= Yii::$app->configManager->getItemValue('companyStartDate'); ?> - <?= date("Y"); ?> <?= Yii::$app->configManager->getItemValue('companyName'); ?>
        </div>
        <div class="footer__contacts">
        <?php if (Yii::$app->configManager->getItemValue('contactPhone') != null): ?>
            <a href="tel:<?= Yii::$app->configManager->getItemValue('contactPhone'); ?>" rel="nofollow">
                <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
            </a>
        </div>
        <?php endif; ?>
        <div class="footer__links">
            <a href="<?= Url::toRoute('/policy')?>" target="_blank">
                <?= Yii::t('app', "Privacy Policy"); ?>
            </a>
        </div>
    </div>
</div>