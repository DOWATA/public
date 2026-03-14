<?php
// (1) 必要なライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
session_start();

// (2) APIキーの設定と初期化
$client = new Google_Client();
$client->setApplicationName("PHP Mook");
$client->setClientId("your_client_id");
$client->setClientSecret("your_client_secret");
$client->setRedirectUri("http://localhost/your_redirect_path.php");
$client->setDeveloperKey("your_developer_key");

// (3) 実際に使用するサービスのスコープ（権限範囲）を設定する
require_once ('Google/Service/Calendar.php');
require_once ('Google/Service/Books.php');
require_once ('Google/Service/Drive.php');
$client->addScope(Google_Service_Calendar::CALENDAR);
$client->addScope(Google_Service_Books::BOOKS);
$client->addScope(Google_Service_Drive::DRIVE);

if(!isset($_SESSION['G_ACCESS_TOKEN'])){
 // (4) 認証URLに遷移するためのURLを作成
 if(!isset($_GET['code'])){
  $authUrl = $client->createAuthUrl();
  print sprintf( "<a href='%s'>Google認証へすすむ</a>", $authUrl );
 }
 else{
  // (5) アクセストークンの設定
  $client->authenticate($_GET['code']);
  $_SESSION['G_ACCESS_TOKEN'] = $client->getAccessToken();
  print "<div>認証しました</div>";
 }
}
if(isset($_SESSION['G_ACCESS_TOKEN'])){
 // (6) アクセストークンがある場合には、実際のサービスを利用する処理をする
 print "<a href='service.php'>サービス利用へすすむ</a>";
}
?>