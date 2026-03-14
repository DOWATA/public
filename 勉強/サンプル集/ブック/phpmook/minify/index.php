<style>
pre{
  padding: 1em;
  border: 1px solid #666666;
}
</style>
<?php
// (1) Autoloaderの設定
require_once("min/lib/Minify/Loader.php");
Minify_Loader::register();

$js = file_get_contents("data/index.js");

// (1) フラグ付きコメントは残してのミニマイズ処理
$min1 = JSMin::minify($js);
$out1 = fopen("out/index.min1.js","w");
fputs($out1,$min1);
fclose($out1);

// (2) フラグ付きコメントも削除のミニマイズ処理 (3)
$min2 = JSMinPlus::minify($js);
$out2 = fopen("out/index.min2.js","w");
fputs($out2,$min2);
fclose($out2);
?>
<h5>JSMin</h5>
<pre>
<?php echo htmlspecialchars($min1) ?>
</pre>
<h5>JSMinPlus</h5>
<pre>
<?php echo htmlspecialchars($min2) ?>
</pre>
