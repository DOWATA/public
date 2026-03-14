<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>phpQuery サンプル</title>
</head>
<body>

<?php
require_once("phpQuery-onefile.php" );

// htmlを取得
$html = file_get_contents("http://codezine.jp/" );

// phpQueryのドキュメントを生成
$doc = phpQuery::newDocument($html);

// title要素内のテキストを表示
echo $doc["title" ]->text();
echo "<br><br>";

// div class="SecondMenu" の要素の下のul -> li要素を取得
foreach ($doc[".SecondMenu" ]->find("ul" )->find("li" ) as $li){

    // li要素の中のa要素を取得
    $a = pq($li)->html();
    // a要素の中のテキストを取得
    echo pq($a)->text() . "<br>";
}
?>
</body>
</html>