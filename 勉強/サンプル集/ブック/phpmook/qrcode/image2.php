<?php
require_once('lib/full/qrlib.php');
$tmpfile = false;
QRcode::png('this is text qrcode',$tmpfile,QR_ECLEVEL_M,10);
?>