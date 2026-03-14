<?php
require_once 'vendor/autoload.php';

//（1）Ubenchオブジェクトの生成
$bench = new Ubench;

echo "（int）キャスト（100万回）<br />"; 

//（2）計測開始
$bench->start();

//（3）計測したい処理を記述する
for ($j = 0; $j < 1000000; $j++) {
	$i = (int)'123';
}
//（4）計測終了
$bench->end();

//（5）結果の取得
echo "計測時間 ". $bench->getTime()."<br />"; 

echo "<br />";

echo "intvalキャスト（100万回）<br />"; 
$bench->start();
for ($j = 0; $j < 1000000; $j++){
	$i = intval('123');
}
$bench->end();
echo "計測時間 ". $bench->getTime()."<br />"; 
