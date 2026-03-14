<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Smartyの基本</title>
</head>
<body>
<table>
	<tr>
		<th>ISBNコード</th><th>書名</th>
		<th>価格</th><th>出版社</th><th>配本日</th>
	</tr>
	{* 書籍情報を順番に出力 *}
	{foreach from=$books item=book}
		<tr>
			<td>{$book.isbn}</td>
			<td>{$book.title}</td>
			<!--<td>{if $book@iteration is odd}<i>{$book.title}</i>{else}{$book.title}{/if}</td>-->
			<td
				{if $book.price lt 3000}style="color:Red;"{/if}>
				{$book.price|number_format}円</td>
			<td>{$book.publish}</td>
			<td>{$book.published|date_format:'%Y/%m/%d'}</td>
		</tr>
	{/foreach}
</table>
</body>
</html>
