<!doctype html> 
<html lang="ja"> 
<head> 
<meta charset=utf-8 /> 
<title>Text_CAPTCHA サンプル</title> 
</head> 
<body> 

<?php
// セッションを開始
session_start();

// POSTされた値と画像認証の文字を比較
if($_POST['phrase']!=null && (@$_POST['phrase'] == @$_SESSION['phrase'])){
    echo '認証OK';
    unset($_SESSION['phrase']);
}else{
//    echo '認証NG';

require_once "Text/CAPTCHA.php";

// 生成する画像のサイズ、出力形式、フォント、色等を指定
$options = array(
    "width" => 200,       // 幅
    "height" => 80,       // 高さ
    "output" => "png",    // 出力形式
    "imageOptions" => array(
                       "font_size" => 30,                // 文字サイズ
                       "font_path" => "./font/",         // フォントへのパス
                       "font_file" => "cour.ttf",        // フォント
                       "text_color" => "#000000",        // 文字色
                       "lines_color" => "#ffffff",       // 線の色
                       "background_color" => "#cccccc",  // 背景色
                      )
);

// 初期化処理
$c = Text_CAPTCHA::factory("Image");
$c->init($options);

// 認証画像を生成
$image = $c->getCAPTCHA();

// PNGファイルとして出力
$image_file = "images/".session_id() . ".png";
file_put_contents($image_file, $image);

// 認証画像の文字をセッションに保存
$_SESSION["phrase"] = $c->getPhrase();

?>
<form method="post">
画像の文字を入力してください。<br>
<img src="<?php echo $image_file; ?>"><br>
<input type="text" name="phrase">
<input type="submit" value="送信">
</form>
<?php
}
?>
</body>
</html>
