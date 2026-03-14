<?php
require_once("vendor/autoload.php");

use ZendPdf\PdfDocument;

// pdfを読み込む
$pdf = PdfDocument::load('sample.pdf');

// ブラウザに表示
header ('Content-Type:', 'application/pdf');
header ('Content-Disposition:', 'inline;');
echo $pdf->render();
?>