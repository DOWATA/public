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

// (1) 新規にGoogle_DriveFileオブジェクトを作成し、必要な情報を設定
$file = new Google_Service_Drive_DriveFile();
$file->setTitle("はじめてのファイル.txt");
$file->setDescription("このファイルはPHPから作成されました");

// (2) 登録処理 
$createdFile = $drive->files->insert($file,array(
  'data' => 'はじめてのテキストファイル',
  'mimeType' => 'text/plain',
  'uploadType' => 'media'
));

header("Location: list.php");
?>