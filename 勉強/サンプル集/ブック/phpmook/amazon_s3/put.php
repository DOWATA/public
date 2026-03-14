<?php
require_once("vendor/autoload.php");
require_once("./config.php");
use Aws\S3\S3Client;
// アクセスする為の設定
$client = S3Client::factory($config);
// (1) 文字列からの登録
$result = $client->putObject(array(
  'Bucket' => 'mookphp',
  'Key'    => 'sample/data1.txt',
  'Body'   => 'Hello!',  // fopen("data/test.txt")のようにリソースも指定可能
));
// (2) ファイル名からの登録
$client->putObject(array(
  'Bucket'     => 'mookphp',
  'Key'        => 'sample/data2.txt',
  'SourceFile' => 'data/test.txt'
));
?>