<?php
require_once("vendor/autoload.php");

use ZendPdf\PdfDocument;
use ZendPdf\Font;

// PDFドキュメントを生成
$pdf = new ZendPdf\PdfDocument();

// A$サイズでPDFのページ生成
$pdfPage = new ZendPdf\Page(ZendPdf\Page::SIZE_A4);

// デフォルトのフォント
//$font = Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA);

// 日本語のフォントを指定
$font = ZendPdf\Font::fontWithPath('HanaMinA.ttf');

// フォントと文字のサイズを指定
$pdfPage->setFont($font , 24); 

// 出力する文字と位置、文字コードの指定
// マルチバイト文字の場合はUTF-8
$pdfPage->drawText('PDF出力サンプル', 100, 500, 'UTF-8');

// 生成したページをPDFドキュメントに追加
$pdf->pages[] = $pdfPage;

// ファイルとして出力、保存
$pdf->save('sample.pdf');

// ブラウザに表示
header ('Content-Type:', 'application/pdf');
header ('Content-Disposition:', 'inline;');
echo $pdf->render();
?>