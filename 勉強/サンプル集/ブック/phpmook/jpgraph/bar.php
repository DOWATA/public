<?php
require_once 'libs/jpgraph.php';
require_once 'libs/jpgraph_bar.php';

$data = array(
  'data' => array(
    array(151, 170, 140, 116, 157),
    array(161, 147, 182, 105, 140),
    array(115, 110, 90, 93, 88),
  ),
  'legends' => array('駅前店', '本通店', '胡町店'),
  'colors' => array('red@0.8', 'green@0.8', 'blue@0.8'),
);

for ($i = 0; $i < count($data['data']); $i++) {
  $b[] = new BarPlot($data['data'][$i]);
  $b[$i]->setLegend($data['legends'][$i]);
  $b[$i]->setFillColor($data['colors'][$i]);
}
$group = new GroupBarPlot($b);

$g = new Graph(400, 400, 'auto');
$g->setScale('textlin');
$g->title->setFont(FF_MINCHO, FS_NORMAL, 14);
$g->title->set('上半期 店舗別販売件数');
$g->legend->setFont(FF_MINCHO, FS_NORMAL, 14);
$g->add($group);
$g->stroke();
