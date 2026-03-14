<?php
// (1) OAuth用に修正したbitly.phpを読む
require_once('oauth/bitly.php');

// (2) 短縮URLを取得する
$result1 = bitly_v3_shorten('http://www.coltware.com/');
$short_url = $result1['url'];
echo '<a href="'.$short_url.'">'.$short_url.'</a>';
echo "<br />\n";

// (3) 作成するドメインをbit.lyから'j.mp'に変更する
$result2 = bitly_v3_shorten('http://www.coltware.com/2009/11/19/git_merge/','j.mp');
$short_url = $result2['url'];
echo '<a href="'.$short_url.'">'.$short_url.'</a>';
echo "<br />\n";
?>