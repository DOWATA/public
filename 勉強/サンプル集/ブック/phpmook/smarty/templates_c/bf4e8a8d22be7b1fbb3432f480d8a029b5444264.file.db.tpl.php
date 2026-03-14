<?php /* Smarty version Smarty-3.1.16, created on 2014-02-26 15:25:14
         compiled from ".\templates\db.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29499530c38fd56be89-75532696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf4e8a8d22be7b1fbb3432f480d8a029b5444264' => 
    array (
      0 => '.\\templates\\db.tpl',
      1 => 1393395910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29499530c38fd56be89-75532696',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530c38fd5caaf9_25320616',
  'variables' => 
  array (
    'books' => 0,
    'book' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c38fd5caaf9_25320616')) {function content_530c38fd5caaf9_25320616($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\phpmook\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
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
	<?php  $_smarty_tpl->tpl_vars['book'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['book']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['books']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['book']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['book']->key => $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->_loop = true;
 $_smarty_tpl->tpl_vars['book']->iteration++;
?>
		<tr>
			<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['book']->value['isbn'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
			<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['book']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
			<td><?php if ((1 & $_smarty_tpl->tpl_vars['book']->iteration)) {?><i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['book']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</i><?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['book']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?></td>
			<td
				<?php if ($_smarty_tpl->tpl_vars['book']->value['price']<3000) {?>style="color:Red;"<?php }?>>
				<?php echo mb_convert_encoding(htmlspecialchars(number_format($_smarty_tpl->tpl_vars['book']->value['price']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
円</td>
			<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['book']->value['publish'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
			<td><?php echo mb_convert_encoding(htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['book']->value['published'],'%Y年%m月%e日'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>
<?php }} ?>
