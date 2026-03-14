<?php
// (1) 初期設定
require_once("vendor/autoload.php");
require_once("./config.php");
use Aws\S3\S3Client;
// (2) キーを設定してクライアントクラスを生成
$client = S3Client::factory(array(
    'key'    => $config['key'],
    'secret' => $config['secret'],
));
// (3) bucketを作成する
$bucket = array('Bucket' => 'dmy_bucket');
$client->createBucket($bucket);
// (4) bucketを削除する
$bucket = array('Bucket' => 'dmy_bucket');
$client->deleteBucket($bucket);
?>
