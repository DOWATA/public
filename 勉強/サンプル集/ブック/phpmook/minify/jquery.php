<?php
require_once("min/lib/Minify/Loader.php");
Minify_Loader::register();

$js = file_get_contents("data/jquery-1.11.0.js");

$min1 = JSMin::minify($js);
$out1 = fopen("out/jquery-1.11.0.min1.js","w");
fputs($out1,$min1);
fclose($out1);

$min1 = JSMinPlus::minify($js);
$out1 = fopen("out/jquery-1.11.0.min2.js","w");
fputs($out1,$min1);
fclose($out1);
?>
