<html>
	<meta charset="UTF-8">
	<body>
a
		<?php foreach ($rows as $row): ?>
			<div style="background-color: #999">
				<?php echo $row['name']; ?>
			</div>
			<div>
				<?php echo $row['email']; ?>
			</div>
			<div>
				<?php echo $row['age']; ?>
			</div>
		<?php endforeach; ?>


	</body>
</html>
