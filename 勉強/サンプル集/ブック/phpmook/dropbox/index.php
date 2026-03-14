<?php
// (1) 必要なライブラリの読み込み
require_once ("vendor/autoload.php");
require_once ("./my_dropbox_key.php");

// (2) 初期設定
$apiKey = $config['key'];
$apiSecret = $config['secret'];

$oauth = new Dropbox_OAuth_PHP ( $apiKey, $apiSecret );
session_start ();
try {
 if (! isset ( $_SESSION ['state'] )) {
  $_SESSION ['state'] = 1;
 }
 $state = $_SESSION ['state'];
 switch ($state) {
  // (3) Dropboxの認証ページへの遷移
  case 1 :
   $token = $oauth->getRequestToken ();
   if ($token) {
    $_SESSION ['token'] = $token;
    $_SESSION ['state'] = 2;
    $callback_url = isset($_SERVER['SCRIPT_URI'])? $_SERVER['SCRIPT_URI']: "http://".$_SERVER['HTTP_HOST'] .$_SERVER['PHP_SELF'];
    $url = $oauth->getAuthorizeUrl ( $callback_url );
    print "認証がされていません";
    print sprintf("<br /><a href='%s'>Dropboxの認証に進む</a>",$url);
   }
   break;
  // (4) DropboxからのCallback処理からのアクセストークンの設定
  case 2 : 
   $oauth->setToken ( $_SESSION ['token'] );
   $token = $oauth->getAccessToken ();
   $_SESSION ['token'] = $token;
   $_SESSION ['state'] = 3;
  case 3:
   print "認証済\n";
   print sprintf("<br /><a href='%s'>Dropboxの操作に進む</a>","list.php");
   break;
 }
} catch ( Exception $ex ) {
 $_SESSION ['state'] = 1;
 print ($ex->getMessage ()) ;
}