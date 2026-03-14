<?php
require_once("vendor/autoload.php");
require_once("./config.php");

use Aws\S3\S3Client;
$client = S3Client::factory($config);

$bucket = 'mookphp';

// ストリームからのデータ登録
$fp = fopen("data/test2.txt","r");
$client->upload($bucket, "test2.txt", $fp);

// 文字列データの登録
//$client->upload($bucket, "test.txt", "test1");
?>