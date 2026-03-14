<?php
require_once 'libs/rss_fetch.inc';
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
define('MAGPIE_CACHE_ON', TRUE);
define('MAGPIE_CACHE_DIR', './cache');
define('MAGPIE_CACHE_AGE', 60 * 30);
define('MAGPIE_FETCH_TIME_OUT', 15);

function h($str) {
  print htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$feed = fetch_rss('http://www.wings.msn.to/contents/rss.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php h($feed->channel['title']); ?></title>
</head>
<body>
<h3><a href="<?php h($feed->image['link']); ?>">
  <img src="<?php h($feed->image['url']); ?>" /></a></h3>
<dl>
<?php
foreach($feed->items as $item){
  $pub = $item['pubdate'] == null ? $item['dc']['date'] : $item['pubdate'];
?>
  <dt>
    【<?php h(date('Y/m/d', strtotime($pub))); ?>】
        <a href='<?php h($item['link']); ?>'>
          <?php h($item['title']); ?></a>
  </dt>
  <dd><?php h(mb_substr($item['description'], 0, 50).' ...'); ?><hr /></dd>
<?php
}
?>
</dl>
</body>
</html>
