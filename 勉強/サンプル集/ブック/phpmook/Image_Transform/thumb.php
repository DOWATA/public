<!doctype html> 
<html lang="ja"> 
<head> 
<meta charset=utf-8 /> 
<title>Image_Transform</title> 
</head> 
<body> 
<?php
require_once("Image/Transform.php");

$input_file  = "sample.jpg";
$output_file = "output.jpg";

// 利用するライブラリを指定
$img = Image_Transform::factory('GD');

// 元画像をロード
$img->load( $input_file );

// 150pxに縮小
$img->scaleMaxLength( 150 );

// 画質を指定
$img->setOption( 'quality', 80 );

// 変換した画像を保存
$img->save( $output_file, 'jpg' );

?>
<img src="<?php echo $input_file; ?>">
<br>
<br>
<!-- 変換した画像を表示 -->
<img src="<?php echo $output_file; ?>">
</body> 
</html> 
