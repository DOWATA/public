<?php
require_once 'libs/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$pur = new HTMLPurifier($config);
print $pur->purify(file_get_contents('dirty.html'));