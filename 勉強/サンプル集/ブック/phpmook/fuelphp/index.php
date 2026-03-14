<!doctype html> 
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0">

<style type="text/css"><!--
body {background-color: #ffffff; color: #000000;}
body, td, th, h1, h2 {font-family: sans-serif;}
pre {margin: 0px; font-family: monospace;}
a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse;}
.center {text-align: center;}
.center table { margin-left: auto; margin-right: auto; text-align: left;}
.center th { text-align: center !important; }
td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
h1 {font-size: 150%;}
h2 {font-size: 125%;}
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold; color: #000000;}
.h {background-color: #9999cc; font-weight: bold; color: #000000;}
.v {background-color: #cccccc; color: #000000;}
i {color: #666666; background-color: #cccccc;}
img {float: right; border: 0px;}
hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
//--></style>
<title>dokuo</title></head>
<body><div class="left">



<?php

$_files = array();
$dir = dir('.');

while( ($ent = $dir->read()) !== FALSE ){
    //var_dump($ent);
    //printf($ent);
//    if( strpos($ent,'rm')>0 || strpos($ent,'wmv')>0 || strpos($ent,'avi')>0 ){
        //printf("<br>");
        //printf("<a href=$ent>$ent</a>");
        //printf("<br>");
        //printf(strpos($ent,'rm'));
        //printf(date('Y/m/d H:i:s' , filectime($ent)));
//        printf("<tr><td class=\"e\">".date('Y/m/d ' , filectime($ent))."</td>");
//        printf("<td class=\"v\"><a href=$ent>$ent</a></td></tr>");
$_files[] = $ent;
//    }
}

asort($_files);
foreach($_files as $k=>$v){


        printf("<a href=$v>$v</a><br />");
}

?>

</div>
</body>
</html>



