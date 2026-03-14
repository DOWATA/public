<?php
require_once "vendor/autoload.php";

$mail = new PHPMailer();
$mail->CharSet = "iso-2022-jp";
$mail->Encoding = "7bit";

//（5）SMTPサーバー（Gmail）の利用設定
$mail->IsSMTP();
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 465;
$mail->Username   = "xxxxxx@gmail.com";
$mail->Password   = "xxxxxxxx";

//（6）HTMLメール
$mail->IsHTML(true);

$mail->AddAddress("to@sample.net");
$mail->From = "from@sample.net";

$mail->FromName = 
	mb_encode_mimeheader(mb_convert_encoding("差出人名","JIS","UTF-8"));
$mail->Subject = 
	mb_encode_mimeheader(mb_convert_encoding("件名","JIS","UTF-8"));

//（7）HTML文
$html = '<a href="http://www.yahoo.co.jp/">Yahoo!</a><br />'
     . 'このメールは、HTMLメールです。<br />'
     . '<b>このメールは、HTMLメールです。</b>';

$mail->Body = mb_convert_encoding($html,"JIS","UTF-8");

//（8）添付ファイル追加
$mail->AddAttachment("sample1.php");

if ($mail->Send()){
    echo("Send mail OK");
}
else{
    echo("Failed to send mail");
}