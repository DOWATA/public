<?php
require_once("lib/jqmPhp.php");

$jqm = new jqmPhp();
$jqm->head()->css('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css');
$jqm->head()->jq('http://code.jquery.com/jquery-1.9.1.min.js');
$jqm->head()->jqm('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js');

$page = new jqmPage("home");
//$page->theme("b");

// ヘッダ
$page->title("header");
$page->header()->theme("b");

// ヘッダのボタン
$page->header()->addButton("Previous", "#", "a", "arrow-l");
$page->header()->addButton("Next", "#", "c", "arrow-r");

$page->addContent("<h1>Sample Page</h1>");
$page->addContent("<p>サンプルページです</p>");

// ボタンを追加
$page->addContent("<a href=\"#\" data-role=\"button\" data-theme=\"e\">Home</a>");
$page->addContent("<a href=\"#\" data-role=\"button\" class=\"ui-btn ui-btn-b\">about us</a>");

// フッタ
$page->footer()->title("footer");
$page->footer()->position("fixed");
$page->footer()->theme("b");

// 出力
$jqm->addPage($page);
echo $jqm;
?>