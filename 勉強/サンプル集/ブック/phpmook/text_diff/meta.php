<?php
ini_set('display_errors',0);
require_once("Text/Diff.php");

$file1 = file("file1.txt");
$file2 = file("file2.txt");

$diff = new Text_Diff('auto',array($file1,$file2));
// (1) 追加された行数
print sprintf('%s行追加されました<br />',$diff->countAddedLines());
// (2) 削除された行数
print sprintf('%s行削除されました<br />',$diff->countDeletedLines());
// (3) 一致している行数
print sprintf('%s行の一致がありました<br />',$diff->lcs());