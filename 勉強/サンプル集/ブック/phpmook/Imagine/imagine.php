<?php
require_once 'vendor/autoload.php';

use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Gd\Imagine;

// (1) Imagineオブジェクトの生成
$imagine = new Imagine();

// （2）1200x1600ピクセルの画像を作成する
$all = $imagine->create(new Box(1200, 1600));

// （3）画像を開き、300x400ピクセルにリサイズする
$photo = $imagine->open('sample.jpg')->resize(new Box(300, 400));

// （4）リサイズした画像を、ひとつの画像に16枚はりつける
for ($y =0; $y<4; $y++) {
	for ($x =0; $x<4; $x++) {
		$all->paste($photo, new Point($x*300, $y*400));
	}
}   
// (5) 保存する
$all->save('all.jpg');