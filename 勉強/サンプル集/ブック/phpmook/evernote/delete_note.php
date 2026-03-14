<?php
require_once ("vendor/autoload.php");

use Evernote\Client as Client;
use EDAM\NoteStore\NoteFilter;
use EDAM\Types\Note;
use EDAM\NoteStore\NoteStoreIf;

session_start();

if($_SESSION['ACCESS_TOKEN']){
 $accessToken = $_SESSION['ACCESS_TOKEN'];
 
 $token = $accessToken['oauth_token'];
 $evernote = new Client( array (
   'token' => $token 
 ) );
 $noteStore = $evernote->getNoteStore();
 $noteStore instanceof NoteStoreIf;
 if(isset($_GET['note_guid'])){
  $noteStore->deleteNote($token, $_GET['note_guid']);
 }
}
header('Location: index.php');
?>