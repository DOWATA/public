<?php
require_once 'vendor/autoload.php'; 

use Slim\Slim;

$app = new Slim(array(
    // テンプレートのパスを設定する
    "templates.path" => "templates"
));

$app->get("/", function () use ($app) {
    // テンプレートを表示する
	$app->render("index.slim.php");
});

$app->post("/login", function () use ($app) {

	// リクエストパラメータの取得
    $req = $app->request();

	// nameリクエストの取得
    $name = $req->post("name");

	// HTMLサニタイジング
	$name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");

	// テンプレートにパラメータを渡して表示する
    $app->render("login.slim.php", array("name" => $name));
});

$app->run();