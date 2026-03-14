<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>phpQuery サンプル</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
require_once("phpQuery-onefile.php");

// div要素を生成
$doc = phpQuery::newDocument("<div>");

// ul要素を生成
$ul = pq("<ul>");

// li要素を生成、テキスト、クラスを追加
$li1 = pq("<li>");
$li1->html("php");
$li1->addClass("black");  // 黒丸

$li2 = pq("<li>");
$li2->html("perl");
$li2->addClass("white");  // 白丸

$li3 = pq("<li>");
$li3->html("java");
$li3->addClass("num");  // 数字

// ul要素にli要素を追加
$ul->append($li1);
$ul->append($li2);
$ul->append($li3);
// div要素にul要素を追加
$doc["div"]->append($ul);

// 表示
echo $doc;
?>

</body>
</html>