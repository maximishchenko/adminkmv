
<nav class="container">
    <div class="menu">
        <?php if (Yii::$app->configManager->getItemValue('contactPhone') != null): ?>
            <div class="menu_item__phone">
                <span>
                    <svg class="logo">
                        <use xlink:href="img/sprite.svg#phone"></use>
                    </svg>
                </span>
                <span>
                    <a href="tel:<?= Yii::$app->configManager->getItemValue('contactPhone'); ?>" rel="nofollow">
                        <?= Yii::$app->configManager->getItemValue('contactPhone'); ?>
                    </a>
                </span>
            </div>
        <?php endif; ?>
        <?php if (Yii::$app->configManager->getItemValue('companyAddress') != null): ?>
        <a href="#map__block">
            <div class="menu_item__address">
                    <span>
                        <svg class="logo">
                            <use xlink:href="img/sprite.svg#location"></use>
                        </svg>
                    </span>
                    <span>
                        <?= Yii::$app->configManager->getItemValue('companyAddress'); ?>
                    </span>
            </div>
        </a>
        <?php endif; ?>
        <?php if (Yii::$app->configManager->getItemValue('contactEmail') != null): ?>
        <div class="menu_item__email">
            <span>
                <svg class="logo">
                    <use xlink:href="img/sprite.svg#mail"></use>
                </svg>
            </span>
            <span>
                <a href="mailto://<?= Yii::$app->configManager->getItemValue('contactEmail'); ?>" rel="nofollow">
                    <?= Yii::$app->configManager->getItemValue('contactEmail'); ?>
                </a>
            </span>
        </div>
        <?php endif; ?>
    </div>
</nav>
