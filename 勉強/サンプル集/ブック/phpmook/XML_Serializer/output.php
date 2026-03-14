<?php
require_once("XML/Serializer.php");

// 出力するXMLの内容
$data = array( 0 => array('attributes' => array('id'=> '1'),
                          'name' => 'iPad Air',
                          'size' => '2,048 x 1,536',
                          'weight' => '469 g'
                          ),
               1 => array('attributes' => array('id'=> '2'),
                          'name' => 'iPad mini',
                          'size' => '1,024 x 768',
                          'weight' => '308 g'
                         )
               );

// XML生成時のオプション
$options = array(
      "indent"          => "\t",    // インデント
      "linebreak"       => "\n",    // 改行コード
      "addDecl"         => true,    // XML宣言
      "encoding"        => "UTF-8", // 文字コード
      "rootName"        => "data",  // ルートのタグ名
      "defaultTagName"  =>          // dataタグ以下のタグ
                           array("data" => "device",),
      "attributesArray" => "attributes"  // 属性と判断する配列
      );

// オプションを指定してインスタンスを生成
$serializer = new XML_Serializer($options);
$serializer->serialize($data);    // 配列をXMLに変換
$result = $serializer->getSerializedData();  // 結果を取得

header("Content-Type: text/xml; charset=utf-8");
echo $result; 

