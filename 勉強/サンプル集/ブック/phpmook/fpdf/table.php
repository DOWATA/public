<?php
require_once 'libs/japanese.php';

function sjis($str) {
  return mb_convert_encoding($str, 'SJIS', 'auto');
}

$pdf = new PDF_Japanese('L', 'mm', 'A4');
$pdf->AddSJISFont();

$pdf->addPage();
$pdf->setFont('SJIS', 'B', 16);

$pdf->cell(60, 14, sjis('ISBNコード'), 1, 0, 'C');
$pdf->cell(105, 14, sjis('書名'), 1, 0, 'C');
$pdf->cell(25, 14, sjis('価格'), 1, 0, 'C');
$pdf->cell(40, 14, sjis('出版社'), 1, 0, 'C');
$pdf->cell(40, 14, sjis('配本日'), 1, 0, 'C');
$pdf->ln();

try {
  $db = new PDO('mysql:dbname=phpmook;host=127.0.0.1;charset=utf8',
    'mookusr', 'mookpass');
  $stt = $db->prepare('SELECT * FROM books ORDER BY published DESC');
  $stt->execute();
  while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
    $pdf->cell(60, 14, sjis($row['isbn']), 1);
    $pdf->cell(105, 14, sjis($row['title']), 1);
    $pdf->cell(25, 14, sjis($row['price'].'円'), 1);
    $pdf->cell(40, 14, sjis($row['publish']), 1);
    $pdf->cell(40, 14, sjis($row['published']), 1);
    $pdf->ln();
  }
} catch (PDOException $e) {
  die($e->getMessage());
}
$pdf->output();
