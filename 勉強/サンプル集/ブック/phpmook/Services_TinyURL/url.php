<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Services::TinyURL</title>
</head>
<body>
<?php
require_once 'Services/TinyURL.php'; 

// URLを短縮
$tiny = new Services_TinyURL(); 
$url = $tiny->create('http://www.amazon.co.jp/dp/4774162965/'); 

echo $url;
echo "<br>";


// URLを展開
try {
    $tiny = new Services_TinyURL();
    $src = $tiny->lookup('http://tinyurl.com/ll4duyz');
    echo $src . "<br>";
} catch (Services_TinyURL_Exception $e) {
    echo $e->getMessage() . "<br>";
}

?>
</body>
</html>