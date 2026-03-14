<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ZendGdata</title>
</head>
<body>
<?php

require_once 'vendor/autoload.php';

$client = new ZendGData\HttpClient();
$client->setAdapter('Zend\Http\Client\Adapter\Socket');
$client->getAdapter()->setOptions(array('sslverifypeer' => false));

// 利用するサービスを指定
$service = ZendGData\Docs::AUTH_SERVICE_NAME;

// Google アカウントでログイン
$client = ZendGData\ClientLogin::getHttpClient('Googleアカウント', 'パスワード', $service, $client );

// Google ドライブにアクセス
$docs = new ZendGData\Docs($client);

// ドキュメントのリストを取得
$feed = $docs->getDocumentListFeed();

// 取得したドキュメントの名前を表示
foreach ($feed->entries as $entry) {
    echo "$entry->title\n<br>";
}
?>
</body>
</html>