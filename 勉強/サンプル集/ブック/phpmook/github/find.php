<?php
// 初期設定
require_once ("vendor/autoload.php");
use Github\Client as Client;
$client = new Client();

// (1) キーワードからのリポジトリの検索
$repo = $client->api( 'repo' );
$repo instanceof Github\Api\Repo;
$repos = $repo->find( 'xml',           //  キーワードは'xml'
  array ( 'language' => 'php' ));      //  言語は'php'

$list = $repos['repositories'];
$count = count( $list );

print sprintf( "全部で %s 件のリポジトリが見つかりました<br />", $count );
foreach( $list as $repository ){
  // (2) リポジトリ情報の表示
  print sprintf( "<h1><a href='%s' target='_blank'>%s</a></h1>\n", 
    $repository['url'], $repository['name'] );
  print sprintf( "followers:%s/forks:%s<span><br />", 
    $repository['followers'], $repository['forks'] );
  $desc = $repository['description'];
  print sprintf( "<p>%s</p>\n", htmlspecialchars( $desc ) );
  if($repository['language']){
   print sprintf( "<p>lang:%s</p>", $repository['language']);
  }
}