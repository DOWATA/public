<?php
require_once 'underscore.php'; 

echo '<pre>';
$ary = array(1,4,3,3,3);

//(1) 配列を順番に処理する
__::each($ary,  function($num) { echo $num . ',';});

echo "\n\n";

$ary = array(123,455,244,7876,943,8844,31,94);

//(2)  配列から偶数のみ取り出す
var_dump( __::filter($ary, function($num){ return $num % 2 == 0;} ) );

echo "\n\n";

$ary1 = array(1, 2, 3, 4, 5);
$ary2 = array(5, 2, 10);
//(3) 異なる値を取り出す
var_dump( __::difference($ary1,$ary2) );

echo "\n\n";

$num = 0;
//（4）一度しか実行されない
$increment = __::once(function() use (&$num) { return $num++; });
$increment();
$increment();
echo $num;

echo "\n\n";

$ary = array('name'=>'wings', 'age'=>25);
//（5）キーを取り出す
var_dump( __::keys($ary) );

$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

//（6） メソッドチェーン
$result = __::chain($numbers)->select(function($n) { return $n < 5; })
                             ->sortBy(function($n) { return -$n; })
                             ->value();

var_dump( $result );
echo '</pre>';

