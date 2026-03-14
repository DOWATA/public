<?php
require_once ("vendor/autoload.php");
use Evernote\Client;
use EDAM\NoteStore\NoteFilter;
use EDAM\Types\Note;
use EDAM\NoteStore\NoteStoreIf;
use EDAM\Types\Notebook;

session_start();

if($_SESSION['ACCESS_TOKEN']){
 $accessToken = $_SESSION['ACCESS_TOKEN'];
 $token = $accessToken['oauth_token'];
 $evernote = new Client( array (
   'token' => $token 
 ) );
 $noteStore = $evernote->getNoteStore();
 $noteStore instanceof NoteStoreIf;
 
 $notebook = new Notebook();
 $notebook->name = 'API集';
 $noteStore->createNotebook($token, $notebook);
 
 header('Location: index.php');
}

?>