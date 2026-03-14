<?php
require_once 'vendor/autoload.php';

use Bullet\App;

// Bulletオブジェクトの生成（1）
$app = new App();

//（2）イベントの定義
$app->path('/hello', function($request) {
    return "Hello World!";
});

//（3）ルーティングの実行
echo $app->run(new Bullet\Request());
