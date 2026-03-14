<?php
//（1）ライブラリを読み込み、利用するクラスを宣言
require_once dirname(__FILE__) . '/vendor/autoload.php';
use MimeMailParser\Parser;
use MimeMailParser\Attachment;

//（2）受信したメールのデータを取得
$raw_mail = stream_get_contents(STDIN);

//（3）インスタンスを生成、メールデータをセット
$parser = new Parser();
$parser->setText($raw_mail);

//（4）ヘッダを解析
$to = $parser->getHeader('to');  // 宛先を取得
$from = $parser->getHeader('from');  // 送信元
$subject = $parser->getHeader('subject');  // 件名
//（5）メール本文を取得
$text = $parser->getMessageBody('text');  // テキストメールの本文
$html = $parser->getMessageBody('html');  // HTMLメールの本文
//（6）添付ファイルを取得
$attachments = $parser->getAttachments();

//（7）添付ファイルを出力
$save_dir = dirname(__FILE__) . '/';
foreach($attachments as $attachment) {
//（8）添付ファイル名
  $filename = $attachment->filename;  // 添付ファイル名
  $data = pathinfo($filename);
  $ext = $data['extension'];  // 拡張子を取得
  $saveFileName = uniqid() .'.'. $ext;  // ユニークなファイル名で保存
  if ($fp = fopen($save_dir.$saveFileName, 'w')) {
    //（9）添付ファイルのデータを読み出して出力
    while($bytes = $attachment->read()) {
      fwrite($fp, $bytes);
    }
    fclose($fp);
  }
}
?>