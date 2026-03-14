<?php
// (1) 初期設定
require_once('vendor/autoload.php');

// (2) ドキュメントのメタデータを設定する
$epub = new EPub();
$epub->setTitle("初めてのePUBドキュメント");
$epub->setDate(time());
$epub->setLanguage("ja");

// (3) 表紙の画像を登録する
$epub->setCoverImage("cover.png",file_get_contents("epub/image/cover.png"),"image/png");

// (4) スタイルシートを設定する
$epub->addCSSFile("book.css", "css", file_get_contents("epub/book.css"));

// (5) コンテンツを登録
$epub->addChapter("チャプター１", "chapter1.html",file_get_contents("epub/chapter1.html"),false,EPub::EXTERNAL_REF_ADD);
$epub->addLargeFile("images/img.png", "cover_image","epub/image/cover.png","image/png");
$epub->addChapter("チャプター２", "chapter2.html",file_get_contents("epub/chapter2.html"),false,EPub::EXTERNAL_REF_ADD);

// (6) 目次の作成
$epub->buildTOC();

// (7) データの生成処理
$epub->finalize();
ob_start();
$ret = $epub->sendBook("sample1.epub");
$data = ob_get_contents();
ob_end_clean();
$fp = fopen("sample2.epub","w");
fwrite($fp,$data);
fclose($fp);

print $data;
?>
