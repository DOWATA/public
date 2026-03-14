<html>
<head>
<meta charset="utf-8">
<title>Faker</title>
<style type="text/css">
td{
border:solid 1px #000000;
text-align:left;
vertical-align:top;
padding:3px;
height:10px;
width:100px;
font-size: 80%;
}
</style>
</head>
<body>
<table>
  <tr>
    <td>名前</td>
    <td>電話番号</td>
    <td>郵便番号</td>
    <td>住所</td>
    <td>メールアドレス</td>
    <td>勤務先</td>
  </tr>
<?php
require_once 'vendor/autoload.php';

//（1）インスタンスを生成
$faker = Faker\Factory::create('ja_JP');

for ($i = 0; $i < 5; $i++) {
    echo "<tr>";
    //（2）姓 名のデータを生成
    echo "<td>" . $faker->lastName . $faker->firstName ."</td>";
    //（3）電話番号
    echo "<td>" . $faker->phoneNumber . "</td>";
    //（4）郵便番号3桁／4桁
    echo "<td>" . $faker->postcode1() ."-",$faker->postcode2()  . "</td>";
    //（5）都道府県／市区町村／番地
    echo "<td>" . $faker->prefecture . $faker->city . $faker->streetAddress . "</td>";
    //（6）メールアドレス
    echo "<td>" . $faker->email . "</td>";
    //（7）会社名
    echo "<td>" . $faker->company . "</td>";
    echo "<tr>";
}
?>