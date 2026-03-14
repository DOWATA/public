<?php
// Autoloaderの設定
require_once("min/lib/Minify/Loader.php");
Minify_Loader::register();

$list = array();
// (1) ファイルを追加する
$list[] = new Minify_Source(array(
  'filepath' => 'data/index.js',
));

// (2) 文字列を対象にする
$list[] = new Minify_Source(array(
  'id' => 'js1',
  'content' =>  file_get_contents('data/index.js'),
));

// (3) 利用者が定義したミニマイズ方法を指定する
function user_jsmin($js){
 $lines = explode("\n", $js);
 $out = array();
 foreach($lines as $line){
  $pos = strpos($line,"--DEBUG--"); // --DEBUG--文を消す
  if($pos === false){
   $out[] = $line;
  }
 }
 return JSMinPlus::minify(join("\n",$out));
}
$list[] = new Minify_Source(array(
  'filepath' => 'data/index.js',
  'minifier' => 'user_jsmin',
));

// (4) すべてを併せてミニマイズする
$all = Minify::combine($list);
$fp = fopen("out/combile.min.js","w");
fwrite($fp,$all);
fclose($fp);
?>