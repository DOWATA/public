<?php
// ライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
require_once ('Google/Service/Drive.php');
include ('./my_api_key.php');
session_start();

$apiConfig ['use_objects'] = true;
$client = new Google_Client ();
$client->setApplicationName ( "PHP Mook" );

$client->setClientId ( $google_api ['client_id'] );
$client->setClientSecret ( $google_api ['client_secret'] );
$client->setRedirectUri ( $google_api ['redirect_url'] );
$client->setDeveloperKey ( $google_api ['developer_key'] );

// アクセストークンの設定
$client->setAccessToken($_SESSION['G_ACCESS_TOKEN']);
$drive = new Google_Service_Drive ( $client );

// (1) ファイル情報の取得
$file_id = $_GET ['file_id'];
$file = $drive->files->get ( $file_id );

$url = $file->getDownloadUrl();
if ($url) {
 // (2) ダウンロードできるファイルの場合にはデータを取得
 $request = new Google_Http_Request( $url, 'GET', null, null );
 $auth = $client->getAuth();
 $httpRequest = $auth->authenticatedRequest( $request );
 $httpRequest instanceof Google_Http_Request;
 if ($httpRequest->getResponseHttpCode () == 200) {
  header ( "Content-Type:" . $file->getMimeType () );
  header ( "Content-Length:" . $file->getFileSize () );
  print $httpRequest->getResponseBody();
 } else {
  die("error :".$httpRequest->getResponseHttpCode ());
 }
}
else{
 // (3) ダウンロードできないファイルの場合には、代わりにリンクを表示
 $url = $file->getAlternateLink();
 print sprintf('<a href="%s">%s</a>',$url,$file->title);
}