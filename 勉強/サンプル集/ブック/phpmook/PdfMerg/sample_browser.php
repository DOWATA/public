<?php
require_once 'PDFMerger.php';

$pdf = new PDFMerger;             // (1) オブジェクトの生成

$pdf->addPDF('sample.pdf', '1-3') // （2）ページの指定
	->addPDF('yahoo.pdf', 'all')
	->merge('browser');            // （3） ブラウザ表示