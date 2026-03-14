<?php 
if(!extension_loaded('ssh2')){
 die('please install ssh2.so');
}
include('my_ssh2_config.php');

// サーバへの接続
$conn = ssh2_connect($config['host'],22);
ssh2_auth_password($conn,$config['username'],$config['password']);

// (1) sftpへの接続
$sftp = ssh2_sftp($conn);

// (2) リモートサーバへのファイルの送信
$out_fp = fopen("ssh2.sftp://$sftp/tmp/remote_sftp_file.txt","w");
$in_fp = fopen("local/local_file.txt","r");
while(!feof($in_fp)){
  $data = fread($in_fp,4096);
  fwrite($out_fp, $data);
}
fclose($out_fp);
fclose($in_fp);
?>