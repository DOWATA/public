<style>
pre{
  padding: 1em;
  border: 1px solid #666666;
}
</style>
<?php
ini_set('display_errors',0);
// (1) 初期設定
require_once("Text/Diff.php");
require_once("Text/Diff/Renderer/context.php");
require_once("Text/Diff/Renderer/unified.php");
require_once("Text/Diff/Renderer/inline.php");

$file1 = file("file1.txt");
$file2 = file("file2.txt");

// (2) 差分の取得
$diff = new Text_Diff('auto',array($file1,$file2));

// inline形式の出力
$renderer = new Text_Diff_Renderer_inline();
echo "<h5>Text_Diff_Renderer_inline</h5>";
echo sprintf("<pre>%s</pre>",$renderer->render($diff));
// context形式の出力
$renderer = new Text_Diff_Renderer_context();
echo "<h5>Text_Diff_Renderer_context</h5>";
echo sprintf("<pre>%s</pre>",$renderer->render($diff));
// unified形式の出力
$renderer = new Text_Diff_Renderer_unified();
echo "<h5>Text_Diff_Renderer_unified</h5>";
echo sprintf("<pre>%s</pre>",$renderer->render($diff));
