<?php
require_once("GoogleMap.php");
require_once("JSMin.php");

// インスタンス生成
$gmap = new GoogleMapAPI(); 

// スマートフォン対応
$gmap->mobile =true;

// 地図の種類を指定
$gmap->setMapType('map');

// マーカーを追加
$gmap->addMarkerByAddress("井の頭公園","井の頭公園周辺マップ", "井の頭公園の入り口");

// ズームの指定
$gmap->setZoomLevel(17);
?>
<html>
<head>
<meta charset="utf-8">
<?php echo $gmap->getHeaderJS(); ?>
<?php echo $gmap->getMapJS(); ?>
</head>
<body>
<?php echo $gmap->printOnLoad(); ?>
<?php echo $gmap->printMap(); ?>
<?php echo $gmap->printSidebar(); ?>
</body>
</html>
