<?php
	require_once "./libchart/classes/libchart.php";

	// （1）棒グラフ（縦向き）
	$chart = new VerticalBarChart(500, 250);

	// （2）データの設定
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("1月", 52.3));
	$dataSet->addPoint(new Point("2月", 56.1));
	$dataSet->addPoint(new Point("3月", 117.5));
	$dataSet->addPoint(new Point("4月", 124.5));
	$dataSet->addPoint(new Point("5月", 137.8));
	$dataSet->addPoint(new Point("6月", 167.7));

	// （3）データの適用
	$chart->setDataSet($dataSet);

	// （4）タイトルの設定
	$chart->setTitle("平均降水量（mm）");

	// （5）グラフ画像の生成
	$chart->render("generated/BarChart.png");
