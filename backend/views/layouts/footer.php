<footer class="main-footer">
    
    <?php if (isset($this->blocks['buttons'])): ?>
        <?= $this->blocks['buttons']; ?>
    <?php endif; ?>

    <strong>
        &copy; <?= Yii::$app->configManager->getItemValue('companyStartDate'); ?>-<?= date("Y"); ?> 
        <a href="<?= Yii::$app->request->hostInfo; ?>">
            <?= Yii::$app->configManager->getItemValue('companyName'); ?>
        </a>.
    </strong>
    <?= Yii::t('app', 'All rights reserved.'); ?>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>