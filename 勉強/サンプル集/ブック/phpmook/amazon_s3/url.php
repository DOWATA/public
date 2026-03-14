<?php
require_once("vendor/autoload.php");
require_once("./config.php");

use Aws\S3\S3Client;
$client = S3Client::factory($config);
// (1) ダウンロードできる
$url1 = $client->getObjectUrl('mookphp', "sample/data1.txt");
print sprintf('<a href="%s">%s</a>',$url1,$url1);
print '<br />';
// (2) ５分間だけダウンロードできるURLを作成する
$url2 = $client->getObjectUrl('mookphp', "sample/data2.txt","+5 minutes");
print sprintf('<a href="%s">%s</a>',$url2,$url2);
?>