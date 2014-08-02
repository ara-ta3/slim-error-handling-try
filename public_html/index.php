<?php

require '../vendor/autoload.php';

// 初期化

$app = new \Slim\Slim();

// エラーハンドリング



// ルーティング

$app->get('/', function ($name) {
            echo "Hello world";
});

$app->get('/hello/:name', function ($name) {
            echo "Hello, $name";
});


$app->run();
