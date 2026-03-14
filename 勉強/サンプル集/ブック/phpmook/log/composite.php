<?php
require_once 'Log.php';

$disp = Log::factory('display', '', 'phpmook');
$file = Log::factory('file', 'app.log', 'phpmook');
$l = Log::singleton('composite');
$l->addChild($disp);
$l->addChild($file);
$l->log('システム利用不可', PEAR_LOG_EMERG);