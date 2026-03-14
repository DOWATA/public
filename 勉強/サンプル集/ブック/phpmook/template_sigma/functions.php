<?php
require_once("HTML/Template/Sigma.php");
$sigma = new HTML_Template_Sigma();
$sigma->loadTemplateFile("template3.html");

// (1) テンプレート内の関数の定義
$sigma->setCallbackFunction("time", "func_time");
$sigma->setCallbackFunction("hello", "func_hello");

$sigma->setVariable('lang','ja');
$sigma->show();

// (2) 実際に使われる関数
function func_time(){
 return date("Y-m-d H:i:s");
}

function func_hello($lang){
 if($lang == 'ja'){
  return "こんにちは";
 }
 else{
  return "hello";
 }
}