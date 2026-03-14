<?php
require_once("vendor/autoload.php");

use Zend\Http\Client;
use Zend\Http\Request;

$url = 'http://localhost';
$client = new Client($url);

//  通信の詳細設定
$client->setOptions(array(
    'maxredirects' => 5,    //  リダイレクト回数
    'useragent' => 'Mozilla/5.0 (Windows NT 6.0; rv:27.0) Gecko/20100101 Firefox/27.0', //  ユーザエージェント
    'timeout' => 10,    //  タイムアウト秒数
));

$client->setParameterPost(array(
    'form_name' => 'dm_pageitem_login', // FORM名
    'username' => 'xxx', // ログインID
    'password' =>'yyy', // パスワード
));

$client->setMethod(Request::METHOD_POST);
$response = $client->send();

//  通信成功
if ($response->isSuccess())  {
 // ページ取得
 $content = $response->getBody();
 echo $content;
}

?>