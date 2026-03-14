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
$pdf->image('http://www.web-deli.com/image/logo.gif', 100, 100, 90, 40);
$pdf->output();
