<?php
require_once 'PDFMerger.php';

$pdf = new PDFMerger;

$pdf->addPDF('sample.pdf', '1')
	->addPDF('yahoo.pdf', 'all')
	->merge('download', 'download.pdf'); // （4） ダウンロード
