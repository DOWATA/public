<?php
if(!extension_loaded('uri_template')){
 dir('please install uri_template extension');
}

// (1) リスト形式のパラメータ
$params1 = array(
  'q' => array(
    'name',
    'address',
    'tel'
  )
);

print "<h2>リスト形式からのURI作成</h2>";
// (2) リスト形式からのURI作成
$uri = uri_template('http://localhost/uritemplate/query{?q*}',$params1);
print htmlspecialchars($uri)."<br />";
$uri = uri_template('http://localhost/uritempalte/query{/q*}',$params1);
print htmlspecialchars($uri)."<br />";
$uri = uri_template('http://localhost/uritempalte/query{;q*}',$params1);
print htmlspecialchars($uri)."<br />";

// (3) 連想配列からのパラメータ
$params2 = array(
  'q' => array(
    'f1' => 'name',
    'f2' => 'address',
    'f3' => 'tel'
  )
);
print "<h2>連想配列からのURI作成</h2>";
// 連想配列からのURI作成(4)
$uri = uri_template('http://localhost/uritemplate/query{?q*}',$params2);
print htmlspecialchars($uri)."<br />";
$uri = uri_template('http://localhost/uritempalte/query{/q*}',$params2);
print htmlspecialchars($uri)."<br />";
$uri = uri_template('http://localhost/uritempalte/query{;q*}',$params2);
print htmlspecialchars($uri)."<br />";