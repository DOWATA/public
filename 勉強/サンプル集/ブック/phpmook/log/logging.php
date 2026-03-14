<?php
require_once 'Log.php';

$l = Log::factory('file', 'app.log', 'phpmook');
$l->setMask(Log::MASK(PEAR_LOG_INFO));

$l->log('システム利用不可', PEAR_LOG_EMERG);
$l->log('至急の対応要', PEAR_LOG_ALERT);
$l->log('致命的な問題', PEAR_LOG_CRIT);
$l->log('エラー発生', PEAR_LOG_ERR);
$l->log('警告', PEAR_LOG_WARNING);
$l->log('要注意', PEAR_LOG_NOTICE);
$l->log('情報', PEAR_LOG_INFO);
$l->log('デバッグメッセージ', PEAR_LOG_DEBUG);
