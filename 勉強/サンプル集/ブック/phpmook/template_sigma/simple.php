<?php
// 初期設定
require_once("HTML/Template/Sigma.php");
$sigma = new HTML_Template_Sigma();

// (1) テンプレートの読込
$sigma->loadTemplateFile("template1.html");

// (2) 値の設定
$sigma->setVariable("hello","こんにちは");

// (3) テンプレート内にある変数を取得する
$vars = $sigma->getPlaceholderList();
if(in_array("your_name",$vars)){
 $sigma->setVariable("your_name","こばやし");
}
// (4) HTMLの表示
$sigma->show();
?>