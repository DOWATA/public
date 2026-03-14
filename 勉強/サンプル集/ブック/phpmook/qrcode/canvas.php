<html>
<head>
	<script type="text/javascript" src="lib/js/qrcanvas.js"></script>
</head>
<body>
<canvas id="qrcode" width="200" height="200"></canvas>
<?php
require_once('lib/full/qrlib.php');
$text = "this is sample qr code";
$elemId = "qrcode";
$width = 200;
$margin = 5;
$include = false;
$canvas = QRCode::canvas($text,$elemId,QR_ECLEVEL_M,$width,false,$margin,$include);
print $canvas;
?>
</body>
</html>