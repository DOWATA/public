<?php
require_once('vendor/skydrive/functions.inc.php');
session_start();

$token = $_SESSION['token'];
if(!$token){
 header('Location: index.php');
}
// 初期設定
$token = unserialize($token);
$drive = new skydrive($token['access_token']);

// (1) フォルダIDの取得 (nullの場合にはルート)
$folder_id = $drive->get_folder_properties(null);
// (2) フォルダの作成
$folder_id2 = $drive->create_folder($folder_id['id'], "upload");
// (3) ファイルのアップロード
$drive->put_file($folder_id2[0]['id'], "data/data1.txt");
?>