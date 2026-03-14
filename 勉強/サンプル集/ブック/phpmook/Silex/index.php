<?php
require_once __DIR__.'/vendor/autoload.php'; 
use Silex\Application;

//（1）Silexのクラス生成
$app = new Application();

//（2）ルーティング設定
$app->get('/{id}/{name}', function($id,$name) use($app) { 
    return $app->escape($id) .' '. $app->escape($name); 
});

//（3）アプリケーションの実行
$app->run(); 