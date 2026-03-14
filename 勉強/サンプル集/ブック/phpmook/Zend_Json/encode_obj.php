<?php
require_once("vendor/autoload.php");

use Zend\Json\Json;

class PadData {
    var $name;
    var $size;
    var $weight;
}
// オブジェクトを定義
$data = new PadData();
$data->name = 'iPad Air';
$data->size = '2,048 x 1,536';
$data->weight = '469 g';

$json =  Zend\Json\Json::encode($data);
echo Zend\Json\Json::prettyPrint($json, array("indent" => "    "));