<?php
require_once 'vendor/autoload.php';

// (1)　テンプレートディレクトリの指定
$loader = new Twig_Loader_Filesystem('templates');

// (2)　Twigの設定
$twig = new Twig_Environment($loader);

// (3)　テンプレートの読み込み
$template = $twig->loadTemplate('inheritance-child.html');

$elements = array(
	'読売ジャイアンツ' => '東京ドーム',
	'阪神タイガース阪' => '神甲子園球場',
	'中日ドラゴンズ' => 'ナゴヤドーム'
);

// (4)　変数のレンダリングとHTMLの表示
$template->display(array('elements' => $elements));
