<?php
//（1）ライブラリの読み込み
require_once "pChart/class/pDraw.class.php"; 
require_once "pChart/class/pImage.class.php"; 
require_once "pChart/class/pData.class.php";

//（2）データセットオブジェクトの生成
$myData = new pData(); 
 
// Y軸のデータ追加
$myData->addPoints(array(52.3, 56.1, 117.5, 124.5, 137.8, 167.7 ));

// Y軸のラベル設定
$myData->setAxisName(0,"降水量");

//（3）X軸のデータ追加
$myData->addPoints(array("1月","2月","3月","4月","5月","6月"),"Labels");

// X軸のラベル設定
$myData->setAbscissaName("月");

//（4）X軸の指定
$myData->setAbscissa("Labels");

//（5）グラフの画像サイズとデータセットの設定
$myPicture = new pImage(700,300,$myData);

//（6）フォント設定
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/ipag.ttf","FontSize"=>11));
 
//（7）グラフの描画エリア設定
$myPicture->setGraphArea(60,40,670,240);

//（8）グラフタイトルの追加
$myPicture->drawText(350,5,"棒グラフ例",array("FontSize"=>20,"Align"=>TEXT_ALIGN_TOPMIDDLE));
 
// スケールの描画
$myPicture->drawScale();

// 棒グラフの描画
$myPicture->drawBarChart();

//（9）グラフの出力（ブラウザ）
$myPicture->Stroke();
