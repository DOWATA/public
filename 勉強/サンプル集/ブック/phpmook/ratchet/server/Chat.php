<?php
// (1) 初期処理
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

// (2) クラス定義
class Chat implements MessageComponentInterface {
 
 private $clients;
 
 // (3) コンストラクタ
 public function __construct(){
  $this->clients = new SplObjectStorage();
 }
 // (4) 接続された時の処理
 public function onOpen(ConnectionInterface $conn){
  print "onOpen....\n";
  $this->clients->attach($conn);
 }
 // (5) メッセージが送信されてきたときの処理
 public function onMessage(ConnectionInterface $from, $msg){
  print "onMessage [" . mb_convert_encoding($msg,"SJIS","UTF-8")."]\n";
  foreach($this->clients as $client){
   if($client != $from){
    $item = array(
      'type' => 'recv',
      'message' => $msg
    );
   }
   else{
    $item = array(
      'type' => 'send',
      'message' => $msg
    );
   }
   $client->send(json_encode($item));
  }
 }
 // (6) 接続エラーが起きたときの処理
 public function onError(ConnectionInterface $conn, Exception $e){
  print "onError....\n";
  $this->clients->detach($conn);
 }

 // (7) 切断された時の処理
 public function onClose(ConnectionInterface $conn){
  print "onClose \n";
  $this->clients->detach($conn);
 }
}

?>