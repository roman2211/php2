<?php

return [

    'rootDir' => __DIR__ . "/../",
    'templatesDir' => __DIR__ . "/../views/",
    'defaultController' => 'product',
    'controllerNamespace' => "app\\controllers\\",

    'components' => [
        'db' => [

            'class' => \app\services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'shop',
            'charset' => 'UTF8'
        ],
        'mainController' => [
            'class' => \app\controllers\FrontController::class
        ],
        'auth' => [
            'class' => \app\services\Auth::class
        ],
        'request' => [
            'class' => \app\services\Request::class
        ]
    ]
];