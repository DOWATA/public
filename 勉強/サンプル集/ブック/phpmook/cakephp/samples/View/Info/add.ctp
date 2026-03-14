<div>
	<?php echo $this->Form->create('Info',array('type' => 'post')); ?>
		<table>
			<tr>
				<td>タイトル</td>
				<td><?php echo $this->Form->input('Info.title', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>本文</td>
				<td><?php echo $this->Form->textarea('Info.body'); ?></td>
			</tr>
		</table>
	<?php echo $this->Form->end('新規作成'); ?>
</div>