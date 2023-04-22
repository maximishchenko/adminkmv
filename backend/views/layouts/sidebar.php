<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
        <img src="<?php // echo $assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Yii::$app->homeUrl; ?>" class="d-block">
                    <?= Yii::$app->user->identity->username; ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => Yii::t('app', 'Settings'), 'iconStyle' => 'far', 'iconClassAdded' => 'text-warning', 'url' => ['settings/index']],
                    ['label' => Yii::t('app', 'Users'), 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger', 'url' => ['users/index']],
                    ['label' => Yii::t('app', 'Callbacks'), 'iconStyle' => 'far', 'iconClassAdded' => 'text-default', 'url' => ['callback/index']],
                    ['label' => Yii::t('app', 'Scripts'), 'iconStyle' => 'far', 'iconClassAdded' => 'text-primary', 'url' => ['script/index']],
                    ['label' => Yii::t('app', 'Robots'), 'iconStyle' => 'far', 'iconClassAdded' => 'text-info', 'url' => ['robots/index']],

                    ['label' => Yii::t('app', 'Development'), 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>