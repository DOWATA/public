<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PEAR::Net_GeoIP</title>
</head>
<body>
<?php
require_once "Net/GeoIP.php";

// 
$geoip = Net_GeoIP::getInstance("GeoIP.dat");

echo $geoip->lookupCountryName($_SERVER['REMOTE_ADDR']);
echo '<br>';
echo $geoip->lookupCountryCode($_SERVER['REMOTE_ADDR']);
echo '<br>';
//echo $geoip->lookupLocation($_SERVER['REMOTE_ADDR']);
//echo '<br>';
//echo $geoip->lookupOrg($_SERVER['REMOTE_ADDR']);

?>

</body>
</html>
