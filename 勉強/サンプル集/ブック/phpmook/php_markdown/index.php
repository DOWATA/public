<?php
// (1) 初期設定
require_once("vendor/Michelf/Markdown.inc.php");
use Michelf\Markdown;
// (2) HTMLへの変換
$text = file_get_contents("index.md");
$html = Markdown::defaultTransform($text);
?>
<html>
 <head>
<style type="text/css">
blockquote {
	margin-left: 0.5em;
	padding-left: 0.5em;
	border-left: 1px solid #CCCCCC;
}
code{
	display: block;
	padding: 0.5em;
	width: 80%;
	background-color: #DDDDDD;
	border: 1px dotted #666666;
}
</style>
 </head>
 <body>
 <?php print $html; ?>
 </body>
</html>