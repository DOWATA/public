<?php
require_once "qdmail.php";

//（1）メール本文
$body = '<html><body bgcolor="#aabbff">
<h1>HTMLメール</h1><b>太字</b>
<font color="red">赤い文字</font>
<div>画像は<img src="cid:sample.gif">文章中に置くことができます。</div>
</body></html>';

// （2）メール送信
qd_send_mail(
      'deco',                                    // （3）デコメ指定
      array('xxxxxxxx@ezweb.ne.jp' , '宛先' ) ,  // （4）宛先
      'デコメのテスト' ,                         // （5）件名
      $body,                                     // （6）本文
      array ( 'xxx@xxxxx.net' , '配信元'),       // （7）送信元
      array(array('sample.gif'))                 // （8）添付ファイル
 );
