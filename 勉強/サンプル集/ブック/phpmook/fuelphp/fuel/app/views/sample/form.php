<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php if (isset($errors)): ?>
<ul>
<?php foreach ($errors as $error): ?>
<li><?php echo $error ?></li>
<?php endforeach ?>
</ul>
<?php endif ?>

<?php echo Form::open("sample/save") ?>


お名前:<?php echo Form::input('name', Input::post('name')) ?><br />

mail:<?php echo Form::input('email', Input::post('email'), array('required' => 'required')) ?><br />

年齢:<?php echo Form::input('age', Input::post('age')) ?><br />

<?php echo Form::submit('submit_btn', '送信') ?>
<?php echo Form::close() ?>

</body>
</html>