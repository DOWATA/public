<?php
require_once 'libs/jpgraph.php';
require_once 'libs/jpgraph_pie.php';

$data = array(
  'data'    => array(3125, 2981, 1846, 1124, 1007),
  'legends' => array('駅前店','本通店','胡町点','春日店','元町店'),
  'colors'  => array('#0000FF', '#6600FF', '#CC00FF', '#66CC00', '#FFCC00')
);

$pie = new PiePlot($data['data']);
$pie->setLegends($data['legends']);
$pie->setSize(0.4);
$pie->setSliceColors($data['colors']);

$g = new PieGraph(400,400);
$g->title->SetFont(FF_MINCHO, FS_NORMAL, 14);
$g->legend->setFont(FF_MINCHO, FS_NORMAL, 14);
$g->title->Set('店舗別売上高');
$g->add($pie);

$g->stroke();
