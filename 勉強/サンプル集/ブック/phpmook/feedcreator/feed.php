<?php
require_once 'libs/feedcreator.class.php';

$feed = new UniversalFeedCreator(); 
$feed->useCached();
$feed->encoding = 'UTF-8';
$feed->title = 'サーバーサイド技術の学び舎（WINGSプロジェクト）';
$feed->link = 'http://www.wings.msn.to/';
$feed->syndicationURL = 'http://www.wings.msn.to/contents/rss.php';
$feed->description = 'プログラミングに関する最新記事を提供';

$img = new FeedImage(); 
$img->title = 'WINGSプロジェクト';
$img->url = 'http://www.wings.msn.to/image/wings.jpg';
$img->link = 'http://www.wings.msn.to/';
$img->description = 'WINGSプロジェクトはIT系書籍／記事の執筆プロジェクトです';	$feed->image = $img;

try {
  $db = new PDO('mysql:dbname=phpmook;host=127.0.0.1;charset=utf8',
    'mookusr', 'mookpass');
  $stt = $db->prepare('SELECT * FROM articles ORDER BY updated DESC LIMIT 10');
  $stt->execute();

  while($row = $stt->fetch(PDO::FETCH_ASSOC)){
    $item = new FeedItem(); 
    $item->title = $row['title'];
    $item->link = $row['url'];
    $item->description = $row['summary'];
    $item->author = $row['author'];
    $item->category = $row['category'];
    $item->date = date(DATE_RSS, strtotime($row['updated']));
    $feed->addItem($item);
  }
} catch (PDOException $e) {
  die($e->getMessage());
}

$feed->saveFeed('RSS1.0');