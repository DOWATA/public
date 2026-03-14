<?php
require_once("vendor/autoload.php");
require_once("./config.php");

use Aws\S3\S3Client;
$client = S3Client::factory($config);
$temp_file = tempnam("data", "tmp-");
// (1) データ取得
$ret = $client->getObject(array(
  'Bucket' => 'mookphp',
  'Key'    => isset($_GET['key'])? $_GET['key'] : 'sample/data1.txt',
  'SaveAs' => $temp_file)
);
// (2) データのメタ情報
$size  = $ret['ContentLength'];  // => "20"
$type  = $ret['ContentType'];    // => "text/plain"
$mtime = $ret['LastModified'];   // => "Sat, 01 Mar 2014 07:45:45 GMT"

header('Content-Type:'.$type);
header('Content-Length:'.$size);

$body = $ret['Body'];
$body instanceof Guzzle\Http\EntityBody;
print $body;
$body->close();
unlink($temp_file);
?>