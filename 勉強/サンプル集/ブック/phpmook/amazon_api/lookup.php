<html>
<head>
 <meta charset="UTF-8" >
</head>
<body>
<?php
ini_set('display_errors',0);
require_once("./config.php");
// 初期設定
require_once 'Services/Amazon.php';
$amazon = new Services_Amazon($config['key'], $config['secret'], $config['track_id']);
$amazon->setLocale('JP');
// (1) 商品情報取得 
$options = array('ResponseGroup' => 'ItemAttributes,Images');
$id = isset($_GET['id'])? $_GET['id'] : '4774156116';
$result = $amazon->ItemLookup($id,$options);
// 見つかった商品を表示
if(!PEAR::isError($result)){
 $item = $result['Item'][0];
 print sprintf('<h4>%s</h4>',htmlspecialchars($item['ItemAttributes']['Title']));
 print sprintf('<a href="%s">詳細へ</a><br />',$item['DetailPageURL']);
 print sprintf('<img src="%s" style="float: left">',$item['MediumImage']['URL']);
 print '<div style="float:left; padding-left: 1em">';
 foreach($item['ItemLinks'] as $links){
  foreach($links as $link){
   print sprintf('<a href="%s">%s</a><br />',$link['URL'],$link['Description']);
  }
 }
 print "</div>";
}
?>
</body>
</html>