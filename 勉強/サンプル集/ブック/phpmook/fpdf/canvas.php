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
$pdf->setDrawColor(255, 0, 0);
$pdf->setFillColor(0, 255, 255);
$pdf->rect(50, 50, 30, 40, 'DF');
$pdf->line(90, 50, 140, 100);
$pdf->output();
