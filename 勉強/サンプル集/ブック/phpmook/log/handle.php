<?php
require_once 'Log.php';
error_reporting(0);

function errorHandler($num, $message, $file, $line){
  $l = Log::factory('mail', 'CQW15204@nifty.com', 'phpmook',
    array(
      'from' => 'CQW15204@nifty.ne.jp',
      'subject' => 'アプリエラー通知',
      'preamble' => 'アプリで致命的なエラーが発生しています。'
    )
  );
  $l->setMask(Log::MAX(PEAR_LOG_ERR));
  $l->log("【 $file $line 】 $message", PEAR_LOG_CRIT);
  require_once 'error.php';
  exit();
}
set_error_handler('errorHandler');
