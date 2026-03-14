<?php
require_once 'libs/jpgraph.php';
require_once 'libs/jpgraph_radar.php';

$data = array(
  'data' => array(100, 80, 75, 90, 95),
  'legends' => array('国語', '数学', '理科', '社会', '英語')
);

$g = new RadarGraph(400, 400, 'auto');
$g->setScale('lin');
$g->title->setFont(FF_MINCHO, FS_NORMAL, 14);
$g->title->set('学科別成績');
$g->axis->title->setFont(FF_MINCHO, FS_NORMAL, 14);
$g->setTitles($data['legends']);
$g->add(new RadarPlot($data['data']));

$g->stroke();
