<?php
// （2）ライブラリ／設定ファイルを読み込む
require_once( "Hybrid/Auth.php" );
require_once( "Hybrid/Endpoint.php" ); 
$config = 'config.php';      // config.phpへのパス

// （3）初期化処理
$auth = new Hybrid_Auth( $config ); 

// （4）セッション開始、認証の実行
 if (!isset($_COOKIE["PHPSESSID"])) session_start();
$twitter = $auth->authenticate("Twitter"); 

// （5）認証後の処理
$twitter_user_profile = $twitter->getUserProfile();    // ユーザー情報を取得
$twitter_id = $twitter_user_profile->identifier;    // @以下
$twitter_name = $twitter_user_profile->displayName;   // 表示名

echo "ようこそ、" . $twitter_name .'さん';
?>