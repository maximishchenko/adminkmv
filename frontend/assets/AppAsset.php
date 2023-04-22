<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // '//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap',
        'css/graph-modal.min.css',
        'css/_modal.css',
        'css/_button.css',
        'css/_footer.css',
        'css/_header.css',
        'css/_hero_stage.css',
        'css/_link.css',
        'css/_map.css',
        'css/_services.css',
        'css/_template.css',
        'css/_scroll_top.css',
        'css/_slide.css',
        'css/_error.css',
    ];
    public $js = [
        'js/graph-modal.min.js',
        'js/app.js',
        'js/float-panel.js',
        // 'js/queryloader2.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
