<html>
<head>
<title></title>
</head>
<body>
<?php
require_once 'Date/Holidays.php';
$filename = 'Date_Holidays_Japan/lang/Japan/ja_JP.xml';

$dh = &Date_Holidays::factory('Japan', date('Y'), 'ja_JP');
$dh->addTranslationFile($filename, 'ja_JP');

$i=0;
foreach ($dh->getHolidays() as $h) {
    echo $h->getDate()->format('%Y-%m-%d') . ' : ' .$h->getTitle(). '<br>';
}

?>
</body>
</html>