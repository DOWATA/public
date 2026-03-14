<?php
//（1） ライブラリの読み込む
require_once "php_error.php";
php_error\reportErrors();

//（2） 存在しない変数$bを利用する
$a = $b +1;
?>