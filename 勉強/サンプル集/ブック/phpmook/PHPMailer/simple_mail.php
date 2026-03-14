<?php
require_once "vendor/autoload.php";

//（1）PHPMailerオブジェクトの生成
$mail = new PHPMailer();
$mail->CharSet = "iso-2022-jp";
$mail->Encoding = "7bit";

//（2）宛先、差出人設定
$mail->AddAddress("to@sample.net");
$mail->From = "from@sample.net";

//（3）UTF-8からJISコードに変換する
$mail->FromName =
    mb_encode_mimeheader(mb_convert_encoding("差出人名","JIS","UTF-8"));
$mail->Subject =
    mb_encode_mimeheader(mb_convert_encoding("件名","JIS","UTF-8"));

$body = "メール本文";
$mail->Body  = mb_convert_encoding($body,"JIS","UTF-8");

//（4）メール送信（直接）
if ($mail->Send()){
    echo("Send mail OK");
}
else{
    echo("Failed to send mail");
}