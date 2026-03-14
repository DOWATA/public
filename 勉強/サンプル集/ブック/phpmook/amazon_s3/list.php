<?php
require_once("vendor/autoload.php");
require_once("./config.php");

use Aws\S3\S3Client;
$client = S3Client::factory($config);
$bucket = 'mookphp';
// (1) すべてのオブジェクトを取得する (1)
print "<h2>すべてのオブジェクト一覧</h2>";
print "<ul>";
$param = array(
  'Bucket' => $bucket
);
$iterator = $client->getListObjectsIterator($param);
foreach($iterator as $item){
 print sprintf('<li><a href="get.php?key=%s">%s</a></li>',urlencode($item['Key']),$item['Key']);
}
print "</ul>";
// (2) フォルダ配下相当のオブジェクトを取得する
print "<h2>指定したフォルダ(sample/)にあるオブジェクト一覧</h2>";
print "<ul>";
$param = array(
  'Bucket' => $bucket,
  'Prefix' => 'sample/',
  'Delimitor' => '/'
);
$iterator = $client->getListObjectsIterator($param);
foreach($iterator as $item){
 print sprintf('<li><a href="get.php?key=%s">%s</a></li>',urlencode($item['Key']),$item['Key']);
}
print "</ul>";
