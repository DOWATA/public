<?php
require_once("lib/jqmPhp.php");

$jqm = new jqmPhp();
$jqm->head()->title('jqmPhp');
$jqm->head()->css('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css');
$jqm->head()->jq('http://code.jquery.com/jquery-1.9.1.min.js');
$jqm->head()->jqm('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js');

// idにhomeを指定してページを生成  data-role="page"部分に相当
$page = new jqmPage("home");
//$page->theme("b");

// ヘッダを指定  data-role="header"に相当
$page->title("header");
$page->header()->theme("b");

// コンテンツを指定  data-role="content"に相当
$page->addContent("<h1>Sample Page</h1>");
$page->addContent("<p>サンプルページです</p>");

// フッタを指定  data-role="footer"に相当
$page->footer()->title("footer");
$page->footer()->theme("b");
$page->footer()->position("fixed");

// ページを出力
$jqm->addPage($page);
echo $jqm;
?>