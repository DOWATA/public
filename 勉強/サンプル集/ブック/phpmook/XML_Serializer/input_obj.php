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
$unserializer->setOption('complexType','object');
$unserializer->unserialize($xml); 
$result = $unserializer->getUnserializedData(); 

echo $result->channel->item[0]->title . '<br>';
echo $result->channel->item[0]->link . '<br>';
?>
</body>
</html>
