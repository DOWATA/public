<?php
echo "<pre>";
// (1) APIキーを設定したbitly.phpを読む
require_once('legacy/bitly.php');
// (2) 短縮URLを元にもどす
$results = bitly_v3_expand(array('http://bit.ly/1fQVufR','http://j.mp/1fR1h4Q'));
foreach($results as $item){ 
 // (3) もともとのURLを取得
 echo $item['long_url']."\n";
 
 // (4) クリック数を取得する
 $clicks = bitly_v3_clicks($item['hash']);
 var_dump($clicks);
}
echo "</pre>";
?>
