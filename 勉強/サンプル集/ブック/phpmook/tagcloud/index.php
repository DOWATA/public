<div style="padding:1em;margin:0.5em;">
<?php
// (1) 初期設定
require_once("HTML/TagCloud.php");
$tag = new HTML_TagCloud();

// (2) タグの作成
$tag->addElement("PHP","http://www.php.net",100,strtotime('today'));
$tag->addElement("ビットコイン","",180,time());
$tag->addElement("ビックデータ","",80,strtotime('-1 day'));
$tag->addElement("オリンピック","",40,strtotime('-2 day'));
$tag->addElement("消費税","",80,strtotime('-2 day'));
$tag->addElement("アベノミクス","",80,strtotime('-2 day'));
$tag->addElement("おもてなし","",40);
$tag->addElement("ご当地キャラ","",40);

// (3) 表示
print $tag->buildAll();
?>
</div>