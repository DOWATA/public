<html>
 <head>
  <link rel="stylesheet" href="css.php" type="text/css" />
 </head>
 <body>
  <h1><span class="title">PHPでSCSSを使う</span></h1>
  
  <div class="line_1">
  <button>ボタン</button>
  </div>
  <?php for($i = 1; $i <= 20; $i += 2){ ?>
  <span class="size_<?php  echo $i; ?>">A</span>
  <?php } ?>
 </body>
</html>