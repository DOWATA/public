<!doctype html> 
<html lang="ja"> 
<head> 
<meta charset=utf-8> 
<title>PEAR::Services_OpenSearch</title> 
</head> 
<body> 

<?php
require_once "Services/OpenSearch.php";

// エンドポイント はてなキーワード
$url = "http://search.hatena.ne.jp/osxml";

$os = new Services_OpenSearch ($url);

// 検索を実行
$result= $os->search("ソチオリンピック");

// 結果を取得
foreach ($result as $item) {
    // タイトル
    $title = $item["title"];
    // リンク
    $link = $item["link"];
    // 説明
    $description = $item["description"];
    
    //表示
    echo "<a href=\"" . $link . "\">" . $title . "</a><br>";
    echo $description . "<br><br>";
}

?>

</body>
</html>
