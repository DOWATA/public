<?php
if(!extension_loaded('uri_template')){
	die('please install uri_template extension');
}

// (1) パラメータの設定
$params = array(
	'page' => 1,
	'offset' => 0,
	'limit'  => 20,
	'order'  => 'name'
);

// (2) URIの作成
$uri = uri_template('http://localhost/uritemplate/query/{page}/{offset}/{limit}/{order}',$params,$result);
print sprintf('<a href="%s">%s</a>',$uri,$uri); 
// http://localhost/uritemplate/query/1/0/20/name と出力される
