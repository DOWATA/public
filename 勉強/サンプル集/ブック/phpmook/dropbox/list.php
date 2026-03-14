<pre>
<?php
require_once ("vendor/autoload.php");
include('my_dropbox_key.php');
// アクセスキーとシークレットキーを設定
$oauth = new Dropbox_OAuth_PHP ( $config['key'], $config['secret'] );
session_start ();
// (1) 初期設定
$token = $_SESSION ['token'];
$oauth->setToken ( $token );
$dropbox = new Dropbox_API ( $oauth, 'sandbox' );

// (2) フォルダの情報（ファイル一覧）を取得
$folder = isset($_GET['path'])? $_GET['path'] : '';
$meta = $meta = $dropbox->getMetaData ( $folder, true );
if ($meta) {
 $list = $meta ['contents'];
 foreach($list as $item){
  print_r($item);
 }
}
?>
</pre>