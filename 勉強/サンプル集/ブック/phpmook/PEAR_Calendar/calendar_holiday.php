<html>
<head>
<title></title>
<style type="text/css">
td{
border:solid 1px #000000;
text-align:right;
vertical-align:top;
padding:3px;
height:50px;
width:100px;
font-size: 80%;
}
</style>
</head>
<body>

<?php
require_once("Calendar/Month/Weekdays.php");
require_once 'Date/Holidays.php';
$filename = 'Date_Holidays_Japan/lang/Japan/ja_JP.xml';

$dh = &Date_Holidays::factory('Japan', date('Y'), 'ja_JP');
$dh->addTranslationFile($filename, 'ja_JP');
 
$holidays = array();
foreach ($dh->getHolidays() as $h) {
   $holidays[$h->getDate()->format('%m-%d')] = $h->getTitle();
}

$month = new Calendar_Month_Weekdays(date("Y"), "5", 0);
$month -> build();

echo '<table width="700" border="1" cellspacing="0" style="font:12px;background-color:#ffffff;"><thead><tr>';
echo '<th style="color:ff0000;">日</th><th> 月</th><th>火</th><th>水</th><th>木</th><th>金</th><th style="color:0000ff;">土</th>';

while ($day = $month -> fetch()){
  $dayStr =  ($day->isEmpty()) ? '&nbsp;' : $day->thisDay();
  
  $color = "#000000";
  if ($day -> isFirst()){
    echo '<tr>';
    //echo '<td style="color:#ff0000">'.$dayStr .'</td>';
    $color = "#ff0000";
  }else if ($day -> isLast()){
    //echo '<td style="color:#0000ff">'.$dayStr .'</td>';
    $color = "#0000ff";
  }else{
    //echo '<td>'.$dayStr .'</td>';
  }
  
    $date = sprintf("%02d-%02d", $day->thisMonth(), $day->thisDay());
    if (array_key_exists($date, $holidays) && !$day->isEmpty()) {
        echo '<td style="color:#ff0000">'.$dayStr .'<br>'.$holidays[$date].'</td>';
    }else{
		echo '<td style="color:'.$color.'">'.$dayStr .'</td>';
	}
    
  if ($day -> isLast()){
    echo '</tr>';
  }
}
echo '</table>';
?>
</body>
</html>