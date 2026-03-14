<?php
require_once 'Log.php';
error_reporting(0);

function exceptionHandler($ex) {
  $l = Log::factory('mail', 'CQW15204@nifty.ne.jp', 'phplibs',
    array(
      'from' => 'CQW15204@nifty.ne.jp',
      'subject' => 'アプリエラー通知',
      'preamble' => 'アプリで致命的なエラーが発生しています。'
    )
  );
  $l->setMask(Log::MAX(PEAR_LOG_ERR));
  $l->log("【 {$ex->getFile()} {$ex->getLine()} 】 {$ex->getMessage()}",
    PEAR_LOG_CRIT);
}

set_exception_handler('exceptionHandler');
throw new Exception('アプリで例外が発生しました。');
