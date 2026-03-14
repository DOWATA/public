<?php
// (1) 初期設定
require_once('vendor/skydrive/functions.inc.php');
session_start();

// (2) ログインページへの遷移
if(!isset($_GET['code'])){
 $url = skydrive_auth::build_oauth_url();
 print sprintf('<a href="%s">Goto OneDrive OAuth</a>',$url);
}
else{
 // (3) Callbackからの戻ってきたときの処理
 $response = skydrive_auth::get_oauth_token($_GET['code']);
 if($response){
  $token_ser = serialize($response);
  $_SESSION['token'] = $token_ser;
  header('Location: list.php');
 }
}
?>
