<?php
// 初期設定
use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;
$app = new Micro();

// (1) GETメソッドへのマッピング処理
$app->get("/hello/{name}",function($name){
 $ret = array(
   "name" => $name
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
});

// (2) 宣言された関数を利用してマッピングする
function say_hello($name){
 $ret = array(
   "name" => $name
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
}
$app->get('/hello2/{name}','say_hello');
$app->post('/hello2/{name}','say_hello');

// (3) 複数のHTTPメソッドに対して同じ関数をマッピングする
$app->map('/hello3/{name}', 'say_hello')->via(array('GET','POST','PUT'));

// (4) パラメータのフォーマットをチェックする
$app->get('/news/{group_id:[0-9]{3}}/{news_id:[a-z0-9]+}',function($group_id,$news_id) use($app){
 $ret = array(
   "group_id" => $group_id,
   "news_id"  => $news_id
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
});

// (5) マッピングされたURLに名前をつけて、そのURLを作成する
$app->get('/url/{arg1:[0-9]{3}}/{arg2:[a-z]+}',function($arg1,$arg2){
})->setName('show-url');

$app->get('/url/show/{id:[0-9]{3}}',function($id) use($app){
 $url = $app->url->get(array(
   'for'  => 'show-url',
   'arg1' => $id,
   'arg2' => 'detail'
 ));
 $ret = array(
   'id' => $id,
   'link_url' => $url
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
 print $url;
});

// (6) リクエストパラメータの取得処理
$app->post("/post/{id}", function($id) use($app){
 $request = $app->request;
 $key = $request->get("key");
 $ret = array(
   "key" => $key
 );
 $response = new Response();
 $response->setContentType("application/json;");
 $response->setContent(json_encode($ret));
 return $response;
});

// (7) マッピングがない処理の対応
$app->notFound(function() use($app){
	$response = new Response();
	$response->setStatusCode(404, "Not Found");
	$response->sendHeaders();
});

// (7) 処理の開始
$app->handle();
?>
