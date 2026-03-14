<?php
// (1) 必要なライブラリの読込
require_once("./vendor/autoload.php");
require_once("./server/Chat.php");
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

// (2) サーバの作成
$server = IoServer::factory(
  new HttpServer(
    new WsServer(
     new Chat()
    )
  ),
  8888
);
// (3) サーバの開始
$server->run();
?>