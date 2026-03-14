<?php
require_once("vendor/autoload.php");

use Zend\Json\Json;

 $body = '{
            "iPad Air":{
                        "size":"2,048 x 1,536",
                        "weight":"469 g"
            },
            "iPad2":{
                        "size":"1,024 x 768",
                        "weight":"601 g"
            },
            "iPad mini":{
                        "size":"1,024 x 768",
                        "weight":"308 g"
            }
        }';
        

$result = Zend\Json\Json::decode($body, Zend\Json\Json::TYPE_ARRAY); // 配列を指定

foreach($result as $key=>$item){
    echo $key .'<br>';
    foreach($item as $k=>$v){
        echo $k . ' : ' . $v . '<br>';
    }
}

