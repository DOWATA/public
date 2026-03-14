<?php
require_once 'vendor/autoload.php';

// (1)　テンプレートディレクトリの指定
$loader = new Twig_Loader_Filesystem('templates');

// (2)　Twigの設定
$twig = new Twig_Environment($loader, array('debug' => true));

// (3)　テンプレートの読み込み
$template = $twig->loadTemplate('basic.html');

// (4)　変数のレンダリングとHTMLの表示
$template->display(array('variable1' => 'こんにちは'));
