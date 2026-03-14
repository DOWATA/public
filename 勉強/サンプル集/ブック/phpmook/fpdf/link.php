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
$pdf->setTextColor(0, 0, 255);
$pdf->write(18, sjis('サポートサイトはこちら'), 'http://www.wings.msn.to');
$pdf->output();
