<!doctype html> 
<html lang="ja"> 
<head> 
<meta charset=utf-8> 
<title>Services::Yahoo::JP</title> 
</head> 
<body> 
<?php
require_once 'Services/Yahoo/JP/MA.php';

$yahoo = Services_Yahoo_JP_MA::factory('parse');
// アプリケーションIDを指定
$yahoo->withAppID('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

// 形態素解析を行う文字列の指定
$yahoo->setSentence('2014年の冬季オリンピックがソチで開幕されました。');
// 実行
$result = $yahoo->submit();

// 結果を取得、解析
$xml = $result->xml->ma_result->word_list->word;
echo "<table border=1>";
echo "<tr><td>単語</td><td>読み</td><td>品詞</td></tr>";
foreach($xml as $key => $val){
    echo "<tr>";
    echo "<td>".$val->surface. "</td>";
    echo "<td>".$val->reading . "</td>";
    echo "<td>".$val->pos . "</td>";
    echo "<tr>";
}
echo "</table>";
?>

</body>
</html>
