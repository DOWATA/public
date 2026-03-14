<?php
require_once 'goutte.phar';

use Goutte\Client;

// (1) Goutteオブジェクトの生成
$client = new Client();

// (2) http://www.time-j.net/から「東京の過去36時間の天気」を取得
$crawler = $client->request('GET',
	'http://www.time-j.net/WorldTime/Weather/Weather36h/Asia/Tokyo');

// (3) 「東京の過去36時間の天気」テーブルを指定
$dom = $crawler->filter('table.wtable td');
//$dom->each(function ($node)  {
//echo  $node->text()."<br />";
//});


$ary = array();  // 「現地時間」、「天気」の保存用
$time = "";       // 「現地時間」の一時保管用
$ix = 0;            // 現在行

// (4) テーブルから1行ずつ取得する
$dom->each(function ($node) use (&$ix, &$time, &$ary) {

	// (5) 「現地時間」を取得する
	if (($ix % 8)==0) {
		$time = $node->text();
	}
	// (6) 「天気」を取得する
	else if ((($ix-1) % 8)==0) {
		$ary[ $time ] = $node->text();
	}
	$ix++;
});

// (7) 現地時間、天気を表示する
foreach ($ary as $t => $w){
	echo $t. " ". $w. "<br />";
}
