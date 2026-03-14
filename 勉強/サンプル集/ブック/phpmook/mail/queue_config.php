<?php
require_once 'Mail/Queue.php';

$db = array(
  'type' => 'mdb2',
  'dsn' => 'mysqli://mookusr:mookpass@localhost/phpmook',
  'mail_table' => 'mail_queue'
);

$mail = array(
  'driver' => 'smtp',
  'host' => 'smtp.xxxxx.ne.jp',
  'port' => 25,
  'auth' => FALSE
);
