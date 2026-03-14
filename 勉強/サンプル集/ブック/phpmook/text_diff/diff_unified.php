<?php
$dir = get_include_path();
ini_set('display_errors',0);

require_once("Text/Diff.php");
require_once("Text/Diff/Renderer/unified.php");

$file1 = file("file1.txt");
$file2 = file("file2.txt");

$diff = new Text_Diff('auto',array($file1,$file2));

$renderer = new Text_Diff_Renderer_unified();
?>
<html>
<body>
<pre>
<?php echo $renderer->render($diff); ?>
</pre>
</body>
</html>
