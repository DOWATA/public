<?php
if(!extension_loaded('xmldiff')){
 die('please install xmldiff extension');
}
// (1) 差分を取得
$diff = new XMLDiff\File();
$ret = $diff->diff("file1.xml","file2.xml");
header('Content-Type:text/xml');

// (2) 数値文字参照から文字列に変換
$ret = mb_convert_encoding($ret, 'UTF-8', 'HTML-ENTITIES');
print($ret);
