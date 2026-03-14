<?php 
if(!extension_loaded('ssh2')){
 die('please install ssh2.so');
}
include('my_ssh2_config.php');

// リモートサーバへの接続
$conn = ssh2_connect($config['host'],22);
ssh2_auth_password($conn,$config['username'],$config['password']);

// (1) リモートサーバにファイルを送信
$ret = ssh2_scp_send($conn, "local/local_file.txt", "/tmp/remote_file.txt",0644);
if($ret){
 print "Send OK\n";
}
// (2) リモートサーバからファイルを受信
$ret = ssh2_scp_recv($conn, "/tmp/remote_file.txt", "remote/get_remote_file.txt");
if($ret){
 print "Recv OK\n";
}