<?php
	require_once "./libchart/classes/libchart.php";

	//（6）折れ線グラフ
	$chart = new LineChart(500, 250);

	//（7）データの設定
	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("1月", 9.9));
	$serie1->addPoint(new Point("2月", 10.4));
	$serie1->addPoint(new Point("3月", 13.3));
	$serie1->addPoint(new Point("4月", 18.8));
	$serie1->addPoint(new Point("5月", 22.8));
	$serie1->addPoint(new Point("6月", 25.5));

	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point("1月", 2.5));
	$serie2->addPoint(new Point("2月", 2.9));
	$serie2->addPoint(new Point("3月", 5.6));
	$serie2->addPoint(new Point("4月", 10.7));
	$serie2->addPoint(new Point("5月", 15.4));
	$serie2->addPoint(new Point("6月", 19.1));

	//（8）データの適用
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("最高気温（℃）", $serie1);
	$dataSet->addSerie("最低気温（℃）", $serie2);
	$chart->setDataSet($dataSet);

	//（9）タイトルの設定
	$chart->setTitle("最高気温と最低気温");

	//（10）グラフ画像の生成
	$chart->render("generated/LineChart.png");
