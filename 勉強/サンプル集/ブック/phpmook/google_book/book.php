<html>
<head>
<title>複数の条件から書籍情報を取得</title>
<style type="text/css">
.book {
	border: 1px solid #666666;
	margin: 5px;
	float: left;
	width: 450px;
	height: 750px;
}
</style>
</head>
<?php
// (1) 必要なライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
require_once ('Google/Service/Books.php');
session_start();

$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName( "PHP Mook" );
// (2) 書籍情報だけの取得ならばアクセストークンは必要ない
//$client->setAccessToken($_SESSION['ACCESS_TOKEN']);
$book = new Google_Service_Books($client);

// (3) 一覧から取得する条件を設定
$optParams = array (
  'filter'     => 'ebooks',
  'orderBy'    => 'newest',
  'maxResults' => 18 
);
// (4) 複数の条件を設定
$volumes = $book->volumes->listVolumes( "intitle:ポケットリファレンス subject:Computers", $optParams );
// 取得した情報を表示
$num = $volumes->getTotalItems();
$items = $volumes->getItems();
foreach( $items as $book ){
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
 
 if($book->saleInfo->listPrice){
  print sprintf( "<p>¥%s</p>", $book->saleInfo->listPrice->amount );
 }
 print "</div>";
}
?>
</html>
