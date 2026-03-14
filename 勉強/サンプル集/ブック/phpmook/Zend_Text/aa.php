<?php
require_once("vendor/autoload.php");

use Zend\Text\Figlet\Figlet;

// インスタンスを生成
$figlet = new Zend\Text\Figlet\Figlet();
$figlet->setOutputWidth(120);                             // 幅を指定
$figlet->setJustification(Figlet::JUSTIFICATION_LEFT);    // 横位置
 
// 表示
echo $figlet->render('PHP');
