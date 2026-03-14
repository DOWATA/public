<div>
	<a href="<?php echo $this->Html->url('/info/add'); ?>">新規登録</a>
	<hr />
	<table>
	<?php foreach($list as $item){ ?>
	<tr>
		<td><?php echo h($item['Info']['title']); ?></td>
		<td><?php echo h($item['Info']['body']); ?></td>
		<td><a href="<?php echo $this->Html->url('/info/del/').$item['Info']['id']; ?>">削除</a>
	</tr>
	<?php } ?>
	</table>
</div>