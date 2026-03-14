<?php
require_once("vendor/autoload.php");

use Zend\Text\Table\Table;
use Zend\Text\Table\Row;
use Zend\Text\Table\Column;

// テーブル
$table = new Zend\Text\Table\Table();
$table->setDecorator('ascii');    // 表示するモード
$table->setColumnWidths(array(4, 10, 15, 10, 10));     // カラムの横幅

$data = array(
                    array("iPad Air", "2,048 x 1,536", "264 ppi", "469 g"),
                    array("iPad2", "1,024 x 768", "132 ppi", "601 g"),
                    array("iPad mini", "1,024 x 768", "163 ppi", "308 g"),
                );    // 表示したいデータ

// 行をセット
for($i=0; $i<count($data); $i++){
    // 行を生成
    $row = new Zend\Text\Table\Row();
    $no = $i+1;
    $row->createColumn("{$no}", array('align'=>Column::ALIGN_CENTER));  // 行にカラムを追加
    
    for($j=0; $j<4; $j++){
        // カラムを生成
        $column = new Zend\Text\Table\Column();
        $column->setContent($data[$i][$j]);                       // 表示する値
        $column->setColSpan(1);                                   // 連結するセルの個数
        $column->setAlign(Zend\Text\Table\Column::ALIGN_LEFT);    // 横位置の調整
        $row->appendColumn($column);                              // 行に追加
    }
    // テーブルに行を追加
    $table->appendRow($row);
}
// テーブルを表示
echo $table->render();

