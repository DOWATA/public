<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>XML_Unserializer</title>
</head>
<body>
<?php
require_once("XML/Unserializer.php");

$xml = file_get_contents("http://rss.dailynews.yahoo.co.jp/fc/rss.xml");

$unserializer = new XML_Unserializer();
$unserializer->setOption('parseAttributes',true);
$unserializer->unserialize($xml); 
$result = $unserializer->getUnserializedData(); 

foreach($result["channel"]["item"] as $item){
    echo $item['title'] . '<br>';
    echo $item['link'] . '<br>';
    echo '<br>';
}
?>
</body>
</html>
