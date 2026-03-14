<html>
<head>
 <meta charset="UTF-8" >
</head>
<body>
<?php
ini_set('display_errors',0);
// (1) 初期設定
require_once 'Services/Amazon.php';
$config = array(
  'key'    => 'AWS_ACCESS_KEY',  // AWSのアクセスキーを設定
  'secret' => 'AWS_SECRET_KEY',  // AWSのシークレットキーを設定
  'track_id' => 'ASSOCIATES_TRACK_ID' // アソシエイトプログラムのトラッキングIDを設定
);
$amazon = new Services_Amazon($config['key'], $config['secret'], $config['track_id']);
// (2) 日本のAmazonのサイトを検索対象に指定 (2)
$amazon->setLocale('JP');

// (3) 商品の検索
$options = array(
  'MinimumPrice' => '1500',       // 1,500円以上
  'MaximumPrice' => '3000',       // 3,000円以下
  'Keywords'     => 'プレゼント',   // キーワード「プレゼント」
  'Sort'         => 'salesrank',  // 売り上げランク順
  'ResponseGroup' => 'ItemIds,ItemAttributes,Images'
);
$result = $amazon->ItemSearch('Toys',$options);

// 見つかった商品を表示
if(!PEAR::isError($result)){
 print sprintf('<h4>%s 件見つかりました</h4>',$result['TotalResults']);
 $max = min($result['TotalResults'],3);
 for($i = 0; $i< $max; $i++){
  print "<div>";
  $item = $result['Item'][$i];
  $attrs = $item['ItemAttributes'];
  $id =  $item['ASIN'];
  print sprintf('<h3>(%s) : %s</h3>',htmlspecialchars($attrs['Binding']),htmlspecialchars($attrs['Title']));
  print sprintf('<a href="lookup.php?id=%s"><img src="%s"></a>',$id,$item['MediumImage']['URL']);
  print sprintf('<p>%s</p>',join("<br />",$attrs['Feature']));
  print sprintf('<p>%s</a>',$attrs['ListPrice']['FormattedPrice']);
  print "</div>";
 }
}
?>
</body>
</html>