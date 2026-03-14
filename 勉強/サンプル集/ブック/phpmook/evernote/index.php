<?php
// (1) 必要なライブラリの読み込み
require_once ("vendor/autoload.php");
require_once("./my_evernote_key.php");

// (2) APIキーの設定と初期化
$config = array (
  'consumerKey' => $config['consumerKey'],
  'consumerSecret' => $config['consumerSecret'],
  'sandobox' => $config['sandobox'] 
);
use Evernote\Client;
session_start();
$client = new Client( $config );

try{
 // (3) リクエストトークンを取得する
 if(! isset( $_SESSION['ACCESS_TOKEN'] )){
  if(! isset( $_GET['oauth_verifier'] )){
   $callback_url = isset($_SERVER['SCRIPT_URI'])? $_SERVER['SCRIPT_URI']: "http://".$_SERVER['HTTP_HOST'] .$_SERVER['PHP_SELF'];
   $requestToken = $client->getRequestToken( $callback_url);
   $_SESSION['REQUEST_TOKEN'] = $requestToken;
   $redirectUrl = $client->getAuthorizeUrl( $requestToken['oauth_token'] );
   print sprintf( "<a href='%s'>Evernote認証画面に進む</a>", $redirectUrl );
   exit();
  }else{
   if(isset( $_GET['oauth_verifier'] )){
    // (4) アクセストークンの設定
    $requestToken = $_SESSION['REQUEST_TOKEN'];
    $accessToken = $client->getAccessToken( $requestToken['oauth_token'], $requestToken['oauth_token_secret'], $_GET['oauth_verifier'] );
    $_SESSION['ACCESS_TOKEN'] = $accessToken;
   }
  }
 }
 // (5) アクセストークンがある場合にはノート一覧にすすむリンクを表示
 if($_SESSION['ACCESS_TOKEN']){
  print "<a href='list.php'>ノート一覧に進む</a>";
 }
}catch ( OAuthException $oathex ){
 $_SESSION['ACCESS_TOKEN'] = null;
 $_SESSION['REQUEST_TOKEN'] = null;
 die( $oathex->getMessage() );
}catch ( Exception $ex ){
 die( $ex->getMessage() );
}
?>