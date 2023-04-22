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
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
