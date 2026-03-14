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

// ファイルの削除
$file_id = $_POST['file_id'];
$drive->files->delete($file_id);

header("Location: list.php");
?>