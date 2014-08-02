<?php

require '../vendor/autoload.php';

// 初期化・設定

$app = new \Slim\Slim();

$app->config(array(
    'templates.path' => '../templates',
    'debug' => false,
));

// エラーハンドリング

$app->notFound(function () use ($app) {
    $app->render('404.html');
});

$app->error(function (\Exception $e) use ($app) {
    $app->render('500.html');
});

// ルーティング

$app->get('/', function () {
    echo "Hello world";
});

$app->get('/error', function() {
    throw new Exception();
});

// 実行

$app->run();
