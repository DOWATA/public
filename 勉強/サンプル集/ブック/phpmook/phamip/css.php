<?php
// (1) 初期設定
ini_set( 'display_errors', 0 );
require_once("./lib/sass/SassParser.php");
require_once("./lib/sass/SassFile.php");

// (2) 変換オプションを指定
$params = array(
  'cache' => false, // キャッシュを使わない
);
$sass = new SassParser($params);
// (3) 変換
$tree = $sass->parse("sample.scss",true);
print $tree->render();
?>