<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'configManager',
    ],
    'components' => [
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '',
        ],
        'configManager' => [
            'class' => 'yii2tech\config\Manager',
            'autoRestoreValues' => false,
            'cache' => 'dummyCache',
            'cacheDuration' => -1,
            'storage' => [
                'class' => 'yii2tech\config\StoragePhp',
                'fileName' => "@frontend/runtime/app_config.php",
            ],
            'items' => [
                'companyName' => [
                    'path' => 'company',
                    'label' => Yii::t('app', "COMPANY_NAME"),
                    'description' => Yii::t('app', "COMPANY_NAME_DESCRIPTION"),
                    'value' => "ИП Савенко Александр Юрьевич",
                    'rules' => [
                        ['required']
                    ],
                ],
                'companyAddress' => [
                    'path' => 'address',
                    'label' => Yii::t('app', "COMPANY_ADDRESS"),
                    'description' => Yii::t('app', "COMPANY_ADDRESS_DESCRIPTION"),
                    'value' => "Ставропольский край, г. Минеральные Воды",
                    'rules' => [
                        ['required']
                    ],
                ],
                'companyStartDate' => [
                    'path' => 'startDate',
                    'label' => Yii::t('app', "COMPANY_START_DATE"),
                    'description' => Yii::t('app', "COMPANY_START_DATE DESCRIPTION"),
                    'value' => "2001",
                    'rules' => [
                        ['required']
                    ],
                    'inputOptions' => [
                        'type' => 'integer',
                    ],
                ],
                'contactPhone' => [
                    'path' => 'phone',
                    'label' => Yii::t('app', "CONTACT_PHONE"),
                    'description' => Yii::t('app', "CONTACT_PHONE DESCRIPTION"),
                    'value' => "+7 (928) 348-18-65",
                    'rules' => [
                        ['required']
                    ],
                    'inputOptions' => [
                        'type' => 'phone',
                    ],
                ],
                'contactEmail' => [
                    'path' => 'email',
                    'label' => Yii::t('app', "CONTACT_EMAIL"),
                    'description' => Yii::t('app', "CONTACT_EMAIL DESCRIPTION"),
                    'value' => "start.kmv@yandex.ru",
                    'rules' => [
                        ['required'],
                        ['email']
                    ],
                ],
                'mapApiKey' => [
                    'path' => 'mapApiKey',
                    'label' => Yii::t('app', "MAP API KEY"),
                    'description' => Yii::t('app', "MAP API KEY DESCRIPTION"),
                    'value' => "95783d3e-baf2-4026-8217-9ceb97f17d39",
                    'rules' => [
                    ],
                ],
                'mapCoordinates' => [
                    'path' => 'map_coordinates',
                    'label' => Yii::t('app', "MAP_COORDINATES"),
                    'description' => Yii::t('app', "MAP_COORDINATES DESCRIPTION"),
                    'value' => "44.20896199333302,43.13794994719157",
                    'rules' => [
                        ['required'],
                    ],
                ],
                'seoDefaultTitle' => [
                    'path' => 'seo_title',
                    'label' => Yii::t('app', "SEO_TITLE"),
                    'description' => Yii::t('app', "SEO_TITLE DESCRIPTION"),
                    'value' => "Обслуживание компьютерной и офисной техники, программирование 1С",
                    'rules' => [
                    ],
                ],
                'seoDefaultKeywords' => [
                    'path' => 'seo_keywords',
                    'label' => Yii::t('app', "SEO_KEYWORDS"),
                    'description' => Yii::t('app', "SEO_KEYWORDS DESCRIPTION"),
                    'value' => "Обслуживание компьютерной и офисной техники, программирование 1С",
                    'rules' => [
                    ],
                ],
                'seoDefaultDescription' => [
                    'path' => 'seo_description',
                    'label' => Yii::t('app', "SEO_DESCRIPTION"),
                    'description' => Yii::t('app', "SEO_DESCRIPTION DESCRIPTION"),
                    'value' => "Обслуживание компьютерной и офисной техники, программирование 1С",
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'textarea',
                    ],
                ],
                'isWebSiteOffline' => [
                    'path' => 'is_website_offline',
                    'label' => Yii::t('app', "IS_WEBSITE_OFFLINE"),
                    'description' => Yii::t('app', "IS_WEBSITE_OFFLINE DESCRIPTION"),
                    'value' => false,
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'checkbox',
                    ],
                ],
                'loadingAnimation' => [
                    'path' => 'loading_animation',
                    'label' => Yii::t('app', "LOADING_ANIMATION"),
                    'description' => Yii::t('app', "LOADING_ANIMATION DESCRIPTION"),
                    'value' => false,
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'checkbox',
                    ],
                ],
                'reportTelegramChatID' => [
                    'path' => 'report_telegram_chat_id',
                    'label' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID"),
                    'description' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID DESCRIPTION"),
                    'value' => "-821674887",
                    'rules' => [
                    ],
                ],
            ],
        ],
        'cache' => [
            'class' => YII_ENV_PROD ? \yii\caching\FileCache::class : \yii\caching\DummyCache::class,
        ],
        'dummyCache' => [
            'class' => 'yii\caching\DummyCache',
        ],

    ],
];
