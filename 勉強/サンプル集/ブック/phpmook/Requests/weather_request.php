<?php

// ライブラリの読み込み
require_once './Requests/library/Requests.php';

// AutoLoaderの設定
Requests::register_autoloader();

// 気象データ配信サービス（1）
$weather = 'http://weather.livedoor.com/forecast/webservice/json/v1';

// リクエストデータの設定（2）
$requests = array(
    array(
        'url' => $weather,
        'data' => array( 
            'city' => '130010'      // 東京都
        )
    ),
    array(
        'url' => $weather,
        'data' => array( 
            'city' => '270000'      // 大阪府
        ))
);

// コールバック関数の設定（3）
$options = array(
    'complete' => 'my_callback',
);

// 複数URLのリクエスト（4）
$responses = Requests::request_multiple($requests, $options);

// コールバック関数（5）
function my_callback($request, $id) {
    
    // JSON形式のデータをデコードする
    $obj = json_decode($request->body);
    
    echo '<br />--------------------------------------<br />';

    // 天気概況を出力する
    echo $obj->description->text."\n";
}