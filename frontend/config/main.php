<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'on beforeRequest' => function () {
        if (Yii::$app->configManager->getItemValue('isWebSiteOffline') == true) {
            Yii::$app->catchAll = [
              'site/offline', 
              'name' => "Обслуживание",
              'message' => "Производится обслуживание сайта"
            ];
        }
    },
    'components' => [
        'assetManager' => [
            'bundles' => YII_ENV_PROD ? require(__DIR__.'/assets-prod.php') : null,
            'linkAssets' => true,
            'appendTimestamp' => true,
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                ],
                'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']
            ],
        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [                
                'policy' => 'site/policy',
                'page-not-found' => 'error/page-not-found',
            ],
        ],
    ],
    'params' => $params,
];
