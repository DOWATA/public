<?php
require_once 'MySmarty.class.php';

$s = new MySmarty();

$db = $s->getDb();
$stt = $db->prepare('SELECT * FROM books ORDER BY published');
$stt->setFetchMode(PDO::FETCH_LAZY);
$stt->execute();

$s->assign('books', $stt);
$s->d();
