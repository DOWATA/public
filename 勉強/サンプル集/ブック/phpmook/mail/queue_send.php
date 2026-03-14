<?php
require_once 'queue_config.php';

$queue = new Mail_Queue($db, $mail);
$queue->sendMailsInQueue(10);
