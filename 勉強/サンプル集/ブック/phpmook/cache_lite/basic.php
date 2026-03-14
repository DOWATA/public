<?php
require_once 'Cache/Lite.php';

$cache = new Cache_Lite(
  array(
    'cacheDir' => 'c:/tmp/',
    'lifeTime' => 600,
    'hashedDirectoryLevel' => 5
  )
);

if ($data = $cache->get('current')) {
  print($data);
} else {
  $data = date('Y年m月d日 G:i:s');
  $cache->save($data, 'current');
  print($data);
}
