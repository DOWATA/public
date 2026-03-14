<?php
require_once("HTML/Template/Sigma.php");
$sigma = new HTML_Template_Sigma();
$sigma->loadTemplateFile("template2.html");

$items = array("りんご","ばなな","ぶどう");
// (1) ブロックを繰り返し表示
$sigma->setCurrentBlock("LIST");
foreach($items as $item){
 $sigma->setVariable("item",$item);
 $sigma->parseCurrentBlock();
}
// (2) ブロックの一覧を取得する
$block_list = $sigma->getBlockList();
if(in_array("IF_BLOCK",$block_list)){
 // (3) ブロックの表示、非表示
 $show = true;
 if($show){
  $sigma->touchBlock("IF_BLOCK");
 }
 else{
  $sigma->hideBlock("IF_BLOCK");
 }
}
$sigma->show();