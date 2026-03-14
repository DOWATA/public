<?php
require_once("lib/jqmPhp.php");

$jqm = new jqmPhp();
$jqm->head()->title('jqmPhp');
$jqm->head()->css('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css');
$jqm->head()->jq('http://code.jquery.com/jquery-1.9.1.min.js');
$jqm->head()->jqm('http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js');

// idにhomeを指定してページを生成  data-role="page"部分に相当
$page = new jqmPage("home");

// ヘッダを指定  data-role="header"に相当
$page->title("header");
$page->header()->theme("b");


$listView = new jqmListview();
$listView ->addDivider('Sample Menu', '3')->inset(true);
$listView ->addBasic('Menu1', 'ui.php');
$listView ->addBasic('Menu2', 'ui.php');
$listView ->addBasic('Menu3', '#');
$page->addContent($listView );

$cp = new jqmCollapsible();
$cp->title('開閉式コンテンツ')->collapsed(true)->add('<p>コンテンツ部分です</p>')->theme('a');
$page->addContent($cp);

$nav = new jqmNavbar();
$nav->add(new jqmButton('', '', '', 'b', 'page.php', 'page', '', false));
$nav->add(new jqmButton('', '', '', 'b', 'button.php', 'button', '', false));
$nav->add(new jqmButton('', '', '', 'b', '#', 'ui', '', true));
$page->footer()->add($nav);
 
// フッタを指定  data-role="footer"に相当
//$page->footer()->title("footer");
$page->footer()->theme("b");
$page->footer()->position("fixed");

// ページを出力
$jqm->addPage($page);
echo $jqm;
?>