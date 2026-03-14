<?php

// ライブラリの読み込み（1）
require_once './Requests/library/Requests.php';

// AutoLoaderの設定（2）
Requests::register_autoloader();

// Yahoo!サイトへのアクセス（3）
$request = Requests::get('http://www.yahoo.co.jp/');

echo "<pre>";

// ステータスコードの取得
var_dump($request->status_code);

// レスポンスヘッダの取得
var_dump($request->headers);

echo "</pre>";

