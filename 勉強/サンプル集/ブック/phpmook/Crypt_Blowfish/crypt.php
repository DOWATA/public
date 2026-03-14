<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PEAR::Crypt_Blowfish</title>
</head>
<body>
<?php
require_once 'Crypt/Blowfish.php';

// 暗号化に利用するキー
$key = 'abc1234';
$text = '暗号化するパスワード';

// 初期化処理
$blowfish = new Crypt_Blowfish($key);

// テキストを暗号化する
$encrypt = $blowfish->encrypt($text);
echo $encrypt;
echo '<br><br>';

// 暗号化されたテキストを復号する
$decrypt = $blowfish->decrypt($encrypt);
echo $decrypt;
?>
</body>
</html>
