<?php
require_once("vendor/autoload.php");
require_once("./config.php");

use Aws\S3\S3Client;
$client = S3Client::factory($config);

// オブジェクトの削除
$param = array(
  'Bucket' => 'mookphp',
  'Key'    => 'sample/data_str.txt'
);
$client->deleteObject($param);
?>