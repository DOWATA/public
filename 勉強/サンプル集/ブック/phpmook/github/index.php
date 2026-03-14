<html>
<h1>リポジトリ一覧</h1>
<?php
// (1) ライブラリの読み込みと初期化
require_once ("vendor/autoload.php");
use Github\Client;
$client = new Client();

// (2) 指定したアカウントが保持するリポジトリ一覧の取得
$account = 'coltware';
$user = $client->api( 'user' );
$user instanceof Github\Api\User;
$repos = $user->repositories( $account );

foreach( $repos as $repository ){
 print sprintf( "<h2>リポジトリ:%s</h2><br />", $repository['name'] );
 print "<h3>コミット一覧</h3>";
 print "<ul>";
 // (3) コミット一覧
 $repo = $client->api('repo');
 $repo instanceof Github\Api\Repo;
 $commits = $repo->commits()->all( $account, $repository['name'], array (
   'sha' => 'master' 
 ) );
 foreach( $commits as $commit ){
  print sprintf( "<li><a href='%s' target='_blank'>%s</a> - %s</li>", 
    $commit['html_url'], $commit['sha'], $commit['commit']['message'] );
 }
 print "</ul>";
}
?>
</html>