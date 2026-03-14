<?php
require_once 'vendor/autoload.php';
use Zend\Http\Client;

// ブログの情報
$url = "http://xxxxxxxxxx/xmlrpc.php";    // WordPressのXML-RPCエンドポイント
$user = "ユーザーアカウント";                       // ユーザーアカウント
$passwd = "パスワード";                               // パスワード

// インスタンスを生成
$client = new Zend\XmlRpc\Client($url);
  
// ブログ情報の取得
$infos = $client->call('wp.getUsersBlogs', array($user, $passwd));
$blog_id = $infos[0]['blogid'];               // ブログID
  
// 投稿する内容
$contents = array(
     'title'             => 'Zend XmlRpc Clientからの投稿',
     'categories'        => array('test',),
     'description'       => '投稿する記事の本文',
//     'dateCreated'       => null,
     'wp_slug'           => 'xml-rpc-testpost',// スラッグ
     'mt_excerpt'        => 'Wordpress XML-RPCでの投稿', // 抜粋
     'mt_keywords'       => array('Zend XmlRpc', 'PHP', 'WordPress'),
 );
  
 // 公開設定
 $publish = false;
  
 // 投稿を実行
 $result = $client->call('metaWeblog.newPost',
                         array($blog_id, $user, $passwd, $contents, $publish)
                         );
  print_r($result);
?>