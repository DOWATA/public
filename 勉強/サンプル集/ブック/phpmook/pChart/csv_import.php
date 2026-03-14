<?php
require_once "pChart/class/pDraw.class.php"; 
require_once "pChart/class/pImage.class.php"; 
require_once "pChart/class/pData.class.php";

// データセットオブジェクトの生成
$myData = new pData(); 

//（10）CSVファイルのインポート
$myData->importFromCSV("data.csv",array("GotHeader"=>TRUE));

//（11）Y軸の設定
$myData->setSerieOnAxis("大阪の平均気温",0);
$myData->setSerieOnAxis("東京の平均気温",0);
$myData->setAxisName(0,"平均気温（℃）");
$myData->setSerieOnAxis("大阪の日照時間",1);
$myData->setSerieOnAxis("東京の日照時間",1);
$myData->setAxisName(1,"日照時間（時間）");
$myData->setAxisPosition(1,AXIS_POSITION_RIGHT);

// X軸の設定
$myData->setAbscissaName("2013年");
$myData->setAbscissa("月");

// グラフの画像サイズとデータセットの設定
$myPicture = new pImage(700,300,$myData);

// フォント設定
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/ipag.ttf","FontSize"=>11));

// グラフの描画エリア設定
$myPicture->setGraphArea(60,60,630,260);

// グラフタイトルの追加
$myPicture->drawText(350,5,"平均気温と日照時間（大阪と東京）",array("FontSize"=>18,"Align"=>TEXT_ALIGN_TOPMIDDLE));
 
// スケールの描画
$myPicture->drawScale();

// 凡例の描画
$myPicture->drawLegend(510,60,array("Style"=>LEGEND_NOBORDER,"FontSize"=>9));

//（12）棒グラフの描画
$myData->setSerieDrawable("東京の平均気温",FALSE);
$myData->setSerieDrawable("大阪の平均気温",FALSE);
$myPicture->drawBarChart(array("Rounded"=>TRUE));

//（13） 折れ線グラフの描画
$myData->setSerieDrawable("大阪の平均気温",TRUE);
$myData->setSerieDrawable("東京の平均気温",TRUE);
$myData->setSerieDrawable("大阪の日照時間",FALSE);
$myData->setSerieDrawable("東京の日照時間",FALSE);
$myPicture->drawLineChart();

// データプロットの描画
$myPicture->drawPlotChart(array("PlotBorder"=>TRUE));

// グラフの出力（ブラウザ）
$myPicture->Stroke();
