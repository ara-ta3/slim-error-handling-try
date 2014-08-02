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

$app->get('/notfound', function() use ($app) {
    $app->notFound();
});

$app->get('/error', function() {
    throw new Exception();
});

$app->get('/error/wazato', function() use ($app) {
    try {
        throw new \Exception('わざとのえらー');
    } catch( \Exception $e ) {
        $app->error($e);
    }
    echo 'ここには来ない';
});

// 実行

$app->run();
