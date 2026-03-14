<?php
require_once ("vendor/autoload.php");
include('my_dropbox_key.php');
$oauth = new Dropbox_OAuth_PHP ( $config['key'], $config['secret'] );
session_start ();
// 未認証の場合の処理
if (! isset ( $_SESSION ['state'] ) || ($_SESSION ['state'] != 3)) {
 header ( 'Location: index.php' );
 exit ();
}
// 初期設定
$token = $_SESSION ['token'];
$oauth->setToken ( $token );
$dropbox = new Dropbox_API ( $oauth, 'sandbox' );

// (1) フォルダの作成と削除
$dropbox->createFolder("sample2");


// (2) ファイルの登録と削除
$dropbox->putFile("sample2/sample.txt", "data/sample.txt");

// (3) ファイルのダウンロード
$data = $dropbox->getFile ("sample2/sample.txt");
$fp = fopen("out/sample.txt","w");
fwrite($fp,$data);
fclose($fp);

$dropbox->delete("sample2/sample.txt");
$dropbox->delete("sample2");
?>