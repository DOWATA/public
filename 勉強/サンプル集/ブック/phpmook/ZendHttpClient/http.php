<?php
require_once("vendor/autoload.php");

use Zend\Http\Client;
use Zend\Http\Request;

$client = new Client("http://gihyo.jp/dev");

$client->setOptions(array(
    'maxredirects' => 5,    //  リダイレクト回数
    'useragent' => 'Mozilla/5.0 (Windows NT 6.0; rv:27.0) Gecko/20100101 Firefox/27.0', //  ユーザエージェント
    'timeout' => 10,    //  タイムアウト秒数
));

$client->setMethod(Request::METHOD_GET);
$response = $client->send();

if ($response->isSuccess()) {
    echo $response->getBody();
}

?>