<?php
require_once 'Cache/Lite/Output.php';

$cache = new Cache_Lite_Output(
  array(
    'cacheDir' => 'c:/tmp/',
    'lifeTime' => 600,
    'hashedDirectoryLevel' => 5
  )
);
if (!$cache->start('page')) {
  require_once 'cached.php';
  $cache->end();
}
