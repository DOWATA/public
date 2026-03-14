<?php 
// Autoloaderの設定
require_once("min/lib/Minify/Loader.php");
Minify_Loader::register();

$css = file_get_contents("data/index.css");
// (1) フラグ(!)付きコメントを残すかの設定
$opts = array(
  'preserveComments' => true,
);
// (2) 圧縮処理
$mincss = Minify_CSS::minify($css,$opts);
$out = fopen("out/index.min.css","w");
fwrite($out,$mincss);
fclose($out);
?>