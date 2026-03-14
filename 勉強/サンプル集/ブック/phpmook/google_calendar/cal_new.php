<?php
// ライブラリの読み込み
ini_set('include_path',ini_get('include_path').PATH_SEPARATOR."./google-api-php-client/src");
require_once ('Google/Client.php');
require_once ('Google/Service/Calendar.php');
include ('./my_api_key.php');
session_start();

// 必要なライブラリの初期化
$apiConfig['use_objects'] = true;
$client = new Google_Client();
$client->setApplicationName( "PHP Mook" );
$client->setClientId( $google_api['client_id'] );
$client->setClientSecret( $google_api['client_secret'] );
$client->setRedirectUri( $google_api['redirect_url'] );
$client->setDeveloperKey( $google_api['developer_key'] );

$client->setAccessToken($_SESSION['G_ACCESS_TOKEN']);
$cal = new Google_Service_Calendar($client);

// (1) 登録するカレンダーIDを設定する
$list = $cal->calendarList->listCalendarList();
$cal_id = $list->items[0]->id;

// (2) イベントオブジェクトを作成する
$new_event = new Google_Service_Calendar_Event();
$new_event->summary = 'はじめてのAPIでの予定登録';
$new_event->start = new Google_Service_Calendar_EventDateTime();
$new_event->start->date = '2014-02-14';
$new_event->end = new Google_Service_Calendar_EventDateTime();
$new_event->end->date = '2014-02-15';

// (3) カレンダーにイベントを登録する
$ret = $cal->events->insert( $cal_id, $new_event );
?>