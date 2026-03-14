<?php
// ライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
require_once ('Google/Service/Calendar.php');
include ('./my_api_key.php');
session_start();

if(!$_SESSION['G_ACCESS_TOKEN']){
  die('please access "google_api/index.php" in advance');
}
?>
<html>
 <head>
  <title>予定一覧</title>
  <meta charset="UTF-8" />
 </head>
 <body>
<?php
// 必要なライブラリの初期化
$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName( "PHP Mook" );
$client->setClientId( $google_api['client_id'] );
$client->setClientSecret( $google_api['client_secret'] );
$client->setRedirectUri( $google_api['redirect_url'] );
$client->setDeveloperKey( $google_api['developer_key'] );

// (1) アクセストークンの設定
$client->setAccessToken($_SESSION['G_ACCESS_TOKEN']);
$cal = new Google_Service_Calendar($client);

// (2) カレンダー一覧を取得する
$cal_list = $cal->calendarList; // Google_Service_Calendar_CalendarList_Resource
$list = $cal_list->listCalendarList();

foreach($list as $item){
  $item instanceof Google_Service_Calendar_CalendarListEntry;
  print sprintf('<h3>%s</h3>',$item->summary);
  // (3) 取得したカレンダー一覧から対象のカレンダーを選択する
  $cal_id = $item->id;
  $timeMax = "2014-03-01T00:00:00+09:00";
  $timeMin = "2014-02-01T00:00:00+09:00";
  $opts = array (
    'timeMax' => $timeMax,
    'timeMin' => $timeMin,
    'orderBy' => 'startTime',
    'singleEvents' => true
  );
  $events = $cal->events;  // Google_Service_Calendar_Events_Resource
  $event_list = $events->listEvents( $cal_id, $opts );
  
  // (4) 取得したイベントを表示する
  print "<ul>";
  foreach($event_list->items as $item){
    $item instanceof Google_Service_Calendar_Event;
    print "<li>";
    if($item->getStart()->getDateTime()){
      $start = date('Y/m/d H:i',strtotime($item->getStart()->getDateTime()));
      $end   = date('Y/m/d H:i',strtotime($item->getEnd()->getDateTime()));
      print sprintf("<span>%s - %s</span>",$start,$end);
    }
    else if($item->getStart()->getDate()){
      print sprintf("<span>%s - %s</span>",$item->getStart()->getDate(),$item->getEnd()->getDate());
    }
    print sprintf("<p>%s</p>",htmlspecialchars($item->getSummary()));
    print "</li>";
  }
  print "</ul>";
}
?>
