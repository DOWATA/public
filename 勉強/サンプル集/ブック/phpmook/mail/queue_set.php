<?php
require_once 'queue_config.php';

$queue = new Mail_Queue($db, $mail);

$mime = new Mail_mime();
$mime->setTxtBody(mb_convert_encoding('今日はいい天気です。', 'JIS', 'auto'));

$result = $queue->put(
  'CQW15204@nifty.ne.jp',
  'CQW15204@nifty.com',
  $mime->headers(
    array(
      'From' => mb_encode_mimeheader('山田リオ', 'ISO-2022-JP').
        '<CQW15204@nifty.ne.jp>',
      'To' => mb_encode_mimeheader('鈴木一郎', 'ISO-2022-JP').
        '<CQW15204@nifty.com>',
      'Subject' => mb_encode_mimeheader('Mail_Queueです。', 'ISO-2022-JP'),
      'Content-Type' => 'text/plain; charset=ISO-2022-JP'
    )
  ),
  $mime->get(
    array(
      'head_charset' => 'ISO-2022-JP',
      'text_charset' => 'ISO-2022-JP'
    )
  )
);
