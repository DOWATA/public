<?php
require_once 'vendor/autoload.php';
use Guzzle\Http\Client;

//（1）Twitter APIアクセスするためのクライアントを生成する
$client = new Client('https://api.twitter.com/{version}', array(
    'version' => '1.1'
));

//（2）Oauthプラグインによる認証
$client->addSubscriber(new Guzzle\Plugin\Oauth\OauthPlugin(array(
    'consumer_key'  => 'xxxxxxxxxx',
    'consumer_secret' => 'xxxxxxxxxx',
    'token'       => 'xxxxxxxxxx',
    'token_secret'  => 'xxxxxxxxxx'
)));

//（3）タイムラインをJSON形式で取得する
$body = $client->get('statuses/user_timeline.json')->send()->getBody();

//（4） JSON文字列を、連想配列に変換する
$data = json_decode($body, TRUE );

//（5） ツイートメッセージの取り出し
foreach ( $data as $t ){
	echo "<p>". $t['text'] . "</p>";
}
