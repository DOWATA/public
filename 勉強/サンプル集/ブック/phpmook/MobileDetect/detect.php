<?php
require_once 'Mobile_Detect.php';

echo '<pre>';

//（1）Mobile_Detectオブジェクトの生成
$detect = new Mobile_Detect;

//（2）モバイルかどうか
$check = $detect->isMobile(); 
echo isMobile.' → ';
var_dump($check); 

//（3）タブレットかどうか
$check = $detect->isTablet();
echo isTablet.' → ';
var_dump($check); 
            
echo "\n";

//（4）各メーカーやOSの判別
foreach($detect->getRules() as $name => $regex) {
    $check = $detect->{'is'.$name}();
    echo $name.' → ';
    var_dump($check); 
}
echo '</pre>';
