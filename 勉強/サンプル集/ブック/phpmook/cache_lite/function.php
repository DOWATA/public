<?php
require_once 'Cache/Lite/Function.php';

function currentTime($format){
  return date($format);
}

$cache = new Cache_Lite_Function(
  array(
    'cacheDir' => 'c:/tmp/',
    'lifeTime' => 600,
    'hashedDirectoryLevel' => 5
  )
);

print($cache->call('currentTime', 'Y年m月d日 G:i:s'));