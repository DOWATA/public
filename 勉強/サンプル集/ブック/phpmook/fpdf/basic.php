<?php
require_once 'libs/japanese.php';

function sjis($str) {
  return mb_convert_encoding($str, 'SJIS', 'auto');
}

$pdf = new PDF_Japanese('P', 'mm', 'A4');
$pdf->AddSJISFont();

$pdf->addPage();
$pdf->setFont('SJIS', 'B', 16);
$pdf->setXY(100, 80);
$pdf->write(18, sjis('こんにちは、世界！ '));
$pdf->output();
