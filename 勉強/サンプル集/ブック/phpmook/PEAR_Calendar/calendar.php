<html>
<head>
<title></title>
<style type="text/css">
td{
border:solid 1px #000000;
text-align:right;
padding:3px;
}
</style>
</head>
<body>

<?php
require_once("Calendar/Month/Weekdays.php");

$month = new Calendar_Month_Weekdays(date("Y"), date("m"), 0);
$month -> build();

echo '<table width="350" border="1" cellspacing="0" style="font:12px;background-color:#ffffff;"><thead><tr>';
echo '<th style="color:ff0000;">日</th><th> 月</th><th>火</th><th>水</th><th>木</th><th>金</th><th style="color:0000ff;">土</th>';

while ($day = $month -> fetch()){
  $dayStr =  ($day->isEmpty()) ? '&nbsp;' : $day->thisDay();
  if ($day -> isFirst()){//週の最初（日曜）
    echo '<tr>';
    echo '<td style="color:#ff0000">'.$dayStr .'</td>';
  }else if ($day -> isLast()){//週の最後（土曜）
    echo '<td style="color:#0000ff">'.$dayStr .'</td>';
    echo '</tr>';
  }else{
    echo '<td>'.$dayStr .'</td>';
  }
}
echo '</table>';
?>
</body>
</html>