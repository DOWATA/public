<?php
require_once 'Classes/PHPExcel.php';

//（1）PHPExcelオブジェクトの作成
$obj = new PHPExcel();

//（2）プロパティ情報の編集
$obj->getProperties()->setCreator("Wings")
                             ->setTitle("サンプル");

//（3）シートを指定して、セルに書き込む
$obj->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Hello')
    ->setCellValue('B2', 'world!')
    ->setCellValue('C1', 'Hello')
    ->setCellValue('D2', 'world!')
    ->setCellValue('A5', '日本語の文字列');

//（4）アクティブシート指定
$obj->getActiveSheet()->setCellValue('A8',"Hello\nWorld");

//（5）行を指定して、高さを変更する
$obj->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);

//（6）自動改行
$obj->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);

//（7）Excel2007形式で保存する
$writer = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
$writer->save('sample.xlsx');