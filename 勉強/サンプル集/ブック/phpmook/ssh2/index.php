<?php
if(!extension_loaded('ssh2')){
 die('please install ssh2.so');
}
include('my_ssh2_config.php');

// (1) リモートサーバへの接続
$conn = ssh2_connect($config['host'],22);
ssh2_auth_password($conn,$config['username'],$config['password']);

// (2) コマンドの実行
$command_fp = ssh2_exec($conn, 'ls -l /usr/local');

// (3) コマンド実行結果のストリームの設定をする
$error_fp = ssh2_fetch_stream($command_fp, SSH2_STREAM_STDERR);
stream_set_blocking($error_fp, true);
stream_set_blocking($command_fp, true);

// (4) 実行結果をストリームから取得する
$std_err = stream_get_contents($error_fp);
$std_out = stream_get_contents($command_fp);

print "<pre>---- OUTPUT ----\n";
print $std_out;
print "-----ERROR  ----\n";
print $std_err;
print "----------------</pre>\n";
