<?php
require_once 'excel_reader2.php';

$data = new Spreadsheet_Excel_Reader("sample.xls");
$html = $data->dump(false,false);
$html = str_replace('$$1$$', '置換された文字列', $html);

?>

<html>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:0;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
}
</style>
</head>

<body>
<?php echo $html; ?>
</body>
</html>
