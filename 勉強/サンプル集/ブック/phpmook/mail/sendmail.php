<?php
require_once 'Mail.php';
require_once 'Mail/mime.php';

$mime = new Mail_mime();
$mime->setHTMLBody('mail.dat', TRUE);
  //mb_convert_encoding(file_get_contents('mail.dat'), 'SJIS', 'auto'));
$mime->addAttachment('./banner.png', 'png/image');

$m = Mail::factory('smtp', 
  array(
    'host' => 'smtp.xxxxx.ne.jp',
    'port' => 25,
    'auth' => FALSE
  )
);

$m->send(
  'CQW15204@nifty.com',
  $mime->headers(
    array(
      'From' => mb_encode_mimeheader('掛谷奈美', 'ISO-2022-JP').
        '<CQW15204@nifty.ne.jp>',
      'To' => mb_encode_mimeheader('山田祥寛', 'ISO-2022-JP').
        '<CQW15204@nifty.com>',
      'Subject' => mb_encode_mimeheader('PHPライブラリ入門', 'ISO-2022-JP')
    )
  ),
  $mime->get(
    array(
      'html_encoding' => 'base64',
      'html_charset' => 'Shift_JIS'
    )
  )
);
