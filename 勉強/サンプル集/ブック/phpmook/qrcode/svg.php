<!DOCTYPE html>
<html><head>
<title>SVG-QR Code</title>
<!-- (1) スタイルの設定 -->
<style type="text/css">
#qrcode {
	background-color: #FFFFCC;
	transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
	position: absolute;
	top : 50px;
	left: 50px;
}
#qrcode > use{
	fill: red;
	stroke: none;
}
#qrcode > path {
	fill: green;
	stroke: none;
}
</style></head><body>
<?php
require_once('lib/full/qrlib.php');
$text = "this is sample qr code";
// (2) SVGとして出力
$svg = QRCode::svg($text,"qrcode","tmp/qrcode.svg",QR_ECLEVEL_Q,200);
// (3) CSSで色を指定するので、直接の指定は削除する
$svg = str_replace("fill:#000000;stroke:none", "", $svg);
print $svg;
?>
</body></html>