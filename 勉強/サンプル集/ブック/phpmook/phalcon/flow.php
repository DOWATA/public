<?php
// (1) 初期設定
use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;
$app = new Micro();
// (2) URLマッピング処理
$app->get("/hello/{name}",function($name){
 $ret = array(
   "name" => $name
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
});
//  : URL毎のハンドラを追記していく

// (3) マッピングがない処理の対応
$app->notFound(function() use($app){
	$response = new Response();
	$response->setStatusCode(404, "Not Found");
	$response->sendHeaders();
});
// (4) 処理の開始
$app->handle();
?>
