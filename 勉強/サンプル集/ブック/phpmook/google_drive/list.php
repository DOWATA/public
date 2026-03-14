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

// (1) アクセストークンの設定
$client->setAccessToken($_SESSION['G_ACCESS_TOKEN']);
$drive = new Google_Service_Drive ( $client );

// (2) ファイル一覧を取得
$list_opt = array (
  'maxResults' => 10,     // 最大で10件取得
);
$files = $drive->files; // Google_Service_Drive_FileList
$list = $files->listFiles ( $list_opt );

// (3) 取得した一覧
$items = $list->getItems ();
foreach ( $items as $file ) {
  $file_id = $file->getId ();
  print sprintf ( "<a href='file.php?file_id=%s'>%s</a> ", $file_id, $file->getTitle () );
  print sprintf ( "<form method='POST' action='delete.php'><input type='hidden' name='file_id' value='%s'><input type='submit' value='delete'></form>", $file_id);
  print "<br />";
  print $file->getMimeType ();
  print "<br />";
}