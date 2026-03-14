<?php
require_once('PHPImageWorkshop/ImageWorkshop.php');

use PHPImageWorkshop\ImageWorkshop;

//（1） 最初のレイヤーの作成
$baseLayer = ImageWorkshop::initFromPath('sample.jpg');

//（2） トリミング
$newWidth = 600; 
$newHeight = 500; 
$positionX = 0;
$positionY = 0; 
$position = "LT"; // 左上
$baseLayer->cropInPixel($newWidth, $newHeight, $positionX, $positionY, $position);

//（3） 上に重ねるレイヤーの作成
$watermarkLayer = ImageWorkshop::initFromPath('watermark.png');

//（4）透明度の変更
$watermarkLayer->opacity(50);

//（5）レイヤーの合成
$baseLayer->addLayerOnTop($watermarkLayer, 10, 10, "RB");

//（6）イメージデータの抽出
$image = $baseLayer->getResult();
header('Content-type: image/jpeg');
imagejpeg($image, null, 95); 
exit;