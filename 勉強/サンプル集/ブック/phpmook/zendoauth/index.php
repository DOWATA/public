<?php
require_once('vendor/autoload.php');

// (1) OAuthを利用する為の設定情報
$config = array(
  'callbackUrl' => 'http://localhost/your_calllback_url/index.php',
  'siteUrl'     => 'https://api.dropbox.com/1/oauth',
  'consumerKey'    => 'your_consumer_key',
  'consumerSecret' => 'your_consumer_secret'
);
use ZendOAuth\Consumer;
use Zend\Http\Client as Http_Client;
use ZendOAuth\OAuth;
use Zend\Http\Request;

// (2) セッションにデータを保存するための初期設定
session_start();
if(!isset($_SESSION['status'])){
 $_SESSION['status'] = 'step1';
}

// (3) SSLのキーが間違っていてもエラーにしない
$httpConfig = array(
  'adapter' => 'Zend\Http\Client\Adapter\Socket',
  'sslverifypeer' => false
);
$httpClient = new Http_Client(null, $httpConfig);
OAuth::setHttpClient($httpClient);
$consumer = new Consumer($config);

// (4) リクエストキーの取得
if($_SESSION['status'] == 'step1'){
 $requestToken = $consumer->getRequestToken();
 $ser_requestToken = serialize($requestToken);
 $_SESSION['requestToken'] = $ser_requestToken;
 $_SESSION['status'] = 'step2';
}

// (5) リダイレクトURLの生成
if($_SESSION['status'] == 'step2'){
 if(isset($_GET['uid'])){
  $_SESSION['status'] = 'step3';
 }
 else{
  $requestToken = unserialize($_SESSION['requestToken']);
  $url = $consumer->getRedirectUrl(array(),$requestToken);
  print sprintf('<a href="%s">Redirect</a>',$url);
 }
}

// (6) リダイレクトURLからの戻り処理
if($_SESSION['status'] == 'step3'){
 $requestToken = unserialize($_SESSION['requestToken']);
 $accessToken = $consumer->getAccessToken($_GET, $requestToken);
 if($accessToken){
  $_SESSION['accessToken'] = serialize($accessToken);
  $_SESSION['status'] = 'step4';
 }
}
// (7) アクセストークンでの処理
if($_SESSION['status'] == 'step4'){
 // ここではDropboxでのアカウント情報を取得する
 $url = "https://api.dropbox.com/1/account/info";
 $token = unserialize($_SESSION['accessToken']);
 $client = $token->getHttpClient($config);
 $adapter = new \Zend\Http\Client\Adapter\Socket();
 //$adapter = new \Zend\Http\Client\Adapter\Curl(); // Adapterには他の接続方法も選択可能
 
 $adapter->setOptions(array(
   'sslverifypeer' => false
 ));
 $client->setAdapter($adapter);
 
 $client->setUri($url);
 $client->setMethod(Request::METHOD_GET);
 
 $response = $client->send();
 if($response){
  $body = $response->getBody();
  $params = json_decode($body,true);
  // 結果を取得する
  var_dump($params);
 }
}
?>
