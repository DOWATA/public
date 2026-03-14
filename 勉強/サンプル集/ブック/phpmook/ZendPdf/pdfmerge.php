<?php
require_once("vendor/autoload.php");

use ZendPdf\PdfDocument;

$pdfArray = array('test.pdf',  'sample.pdf');

// マージ用のPDFオブジェクト
$mergePdf = new ZendPdf\PdfDocument();

foreach($pdfArray as $file){
   // pdfを読む
   $pdf = PdfDocument::load($file);
   
   // PDFの内容を取得
   $extractor = new ZendPdf\Resource\Extractor();
   // 各ページを取得
   foreach($pdf->pages as $page){
      // ページの内容をコピー
      $pdfExtract = $extractor->clonePage($page);
      // マージ用のPDFにページ内容を追加
      $mergePdf->pages[] = $pdfExtract;
   }
}


// ブラウザに表示
header ('Content-Type:', 'application/pdf');
header ('Content-Disposition:', 'inline;');
echo $mergePdf->render();

// マージしたPDFを出力、保存
$mergePdf ->save("merge.pdf");
?>