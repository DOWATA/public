<?php
require_once 'libs/Smarty.class.php';

$s = new Smarty();
$s->template_dir = './templates';
$s->compile_dir = './templates_c';

$s->assign('message', 'こんにちは、世界！');
$s->display('begin.tpl');
