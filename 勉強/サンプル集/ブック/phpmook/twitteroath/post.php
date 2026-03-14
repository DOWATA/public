<?php
require_once("twitteroauth/twitteroauth.php");

    // Twitter 設定情報
    $conf =  array(
        //  Consumer key
        'consumer_key' => "xxxxxxxxxxxxx",
        //  Consumer secret
        'consumer_secret' => "xxxxxxxxxxxxx",
        //  Access Token (oauth_token)
        'access_token' => "xxxxxxxxxxxxx",
        //  Access Token Secret (oauth_token_secret)
        'access_token_secret' => "xxxxxxxxxxxxx",
    );
    
    // OAuthオブジェクトの生成
    $twitter = new TwitterOAuth($conf['consumer_key'], $conf['consumer_secret'], 
                                     $conf['access_token'], $conf['access_token_secret']);
    // ツイート
    $r = $twitter->post('statuses/update', array('status' =>'投稿内容'));


print_r($r);

?>