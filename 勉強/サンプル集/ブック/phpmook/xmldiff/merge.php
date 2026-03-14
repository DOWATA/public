<?php
if(!extension_loaded('xmldiff')){
 die('please install xmldiff extension');
}

$diff = new XMLDiff\File();
$ret = $diff->merge("file1.xml","diff.xml");
header('Content-Type:text/xml');
print($ret);