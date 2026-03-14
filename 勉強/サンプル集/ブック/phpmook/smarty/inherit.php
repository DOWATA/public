<?php
require_once 'MySmarty.class.php';

$s = new MySmarty();

$s->assign('message', 'こんにちは、世界！');
$s->d();
