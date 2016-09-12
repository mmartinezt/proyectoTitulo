<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
		'authClientCollection' => [
			'class' => 'yii\authclient\Collection',
			'clients' => [
			'facebook' => [
				'class' => 'yii\authclient\clients\Facebook',
				'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
				'clientId' => '160829171022368',
				'clientSecret' => '4b9dd6af9cfb675f508178ba62dae55f',
				],
			],
		],
    ],
    'params' => $params,
];
