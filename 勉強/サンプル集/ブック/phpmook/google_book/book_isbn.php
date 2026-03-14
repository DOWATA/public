<html>
<head>
<title>ISBNから書籍情報を取得</title>
<style type="text/css">
.book {
	border: 1px solid #666666;
	margin: 5px;
	pading: 5px;
	float: left;
	width: 500px;
	height: 500px;
}
</style>
</head>
<?php
// (1) ライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
require_once ('Google/Service/Books.php');
session_start();

// (2) APIに接続するための初期設定
$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName( "PHP Mook" );
$book = new Google_Service_Books( $client ); // 利用するサービスのインスタンスを作成

// (3) ISBNを指定して書籍情報を検索
$volumes = $book->volumes->listVolumes( "isbn:9784774145921");
// (4) 取得した書籍情報の表示
$num = $volumes->getTotalItems();
if($num > 0){
  $items = $volumes->getItems();
  $book = $items[0];
  print "<div class='book'>";
  $info = $book->volumeInfo;
  $url = $book->volumeInfo->imageLinks->thumbnail;
  print sprintf( "<h1><image src='%s' style='float:left'>", $info->imageLinks->smallThumbnail );
  print sprintf( "<span>%s</span></h1>", htmlspecialchars( $info->title ) );
  print sprintf( "<div style='clear:both'>%s</div>", htmlspecialchars( $info->description ) );
  if($info->pageCount){
   print sprintf( "<p>全%sページ</p>", htmlspecialchars( $info->pageCount ) );
  }
  print sprintf( "<image src='%s'><br /><br />", $url );
  print "</div>";
}
?>
</html>