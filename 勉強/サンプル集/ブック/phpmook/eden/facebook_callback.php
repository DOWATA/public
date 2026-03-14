<?php
require_once('eden.php');
require_once('config.php');

session_start();

eden()->setLoader();

$auth = eden('facebook')->auth($config['key'], $config['pass'], $config['callback_url']);
$access = $auth->getAccess($_GET['code']);

$user = eden('facebook')->graph($access['access_token'])->getUser();

echo 'ようこそ ' .$user['name'] . 'さん';

?>