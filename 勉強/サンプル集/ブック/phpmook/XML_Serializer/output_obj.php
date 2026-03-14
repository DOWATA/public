<?php
require_once("XML/Serializer.php");

class PadData {
    var $name;
    var $size;
    var $weight;
}

$data = new PadData();
$data->name = 'iPad Air';
$data->size = '2,048 x 1,536';
$data->weight = '469 g';


// XML生成時のオプション
 $options = array(
      "indent"          => "\t", // インデントはタブ
      "linebreak"       => "\n", // 改行コード
      "encoding"        => "UTF-8", // 文字コード
      "rootAttributes"  => array(), // ルートの属性
      "rootName"        => "data",	 // ルート名
      "defaultTagName"  => array('data'=> 'drink',	 // ルートのタグ
                                 'drink' => 'item'  // ルート以下の繰り返しのタグ
                                 ),
                                       "attributesArray" => "_attributes" // 属性の配列のキー
      );

$serializer = new XML_Serializer($options);
$serializer->serialize($data);
$result = $serializer->getSerializedData();

header("Content-Type: text/xml; charset=utf-8");
echo $result; 
?>