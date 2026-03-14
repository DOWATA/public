<?php

require_once('eden.php');
require_once('config.php');


eden()->setLoader();
$auth = eden('facebook')->auth($config['key'], $config['pass'], $config['callback_url']);
$loginUrl = $auth->getLoginUrl();

header('Location: ' . $loginUrl);