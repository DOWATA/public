<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Zend_Gdata サンプル</title>
</head>
<body>
<?php
require_once 'vendor/autoload.php';

$client = new ZendGData\HttpClient();
$client->setAdapter('Zend\Http\Client\Adapter\Socket');
$client->getAdapter()->setOptions(array('sslverifypeer' => false));

$service = ZendGData\YouTube::AUTH_SERVICE_NAME;
$client = ZendGData\ClientLogin::getHttpClient('Googleアカウント', 'パスワード', $service, $client );

$youtube = new ZendGData\YouTube($client);
$query = $youtube->newVideoQuery();

// 検索ワード
$query->videoQuery = 'ソチオリンピック';
// 何番目の検索結果から取得するか
$query->startIndex = 0;
// 検索結果の最大数
$query->maxResults = 10;
// 並び順：閲覧数
$query->orderBy = 'viewCount';

// 検索を実行
$videoFeed = $youtube->getVideoFeed($query); 

// 検索結果を解析
foreach ($videoFeed as $videoEntry) {
    echo '<a href="' . $videoEntry->getVideoWatchPageUrl() . '" target="_blank">';
    echo $videoEntry->getVideoTitle() . '</a><br>';
    echo $videoEntry->getVideoCategory() . ' / '. $videoEntry->getVideoViewCount() . '<br>';
    
    $thumbNails = $videoEntry->getVideoThumbnails();
    echo '<img src="'.$thumbNails[0]['url'],'" width="200"><br>';
    echo $videoEntry->getVideoDescription() . '<br>';
    echo "\n\n\n<br><br>";
}
?>
</body>
</html>