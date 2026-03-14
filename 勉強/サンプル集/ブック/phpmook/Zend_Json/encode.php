<?php
require_once("vendor/autoload.php");

use Zend\Json\Json;

$data = array(
    "iPad Air" => array(
                         "size" => "2,048 x 1,536",
                         "weight" =>"469 g"
                   ),
    "iPad2" => array(
                         "size" => "1,024 x 768",
                         "weight" =>"601 g"
                   ),
    "iPad mini" => array(
                         "size" => "1,024 x 768",
                         "weight" =>"308 g"
                   ),
);

$json =  Zend\Json\Json::encode($data);
echo Zend\Json\Json::prettyPrint($json, array("indent" => "    "));