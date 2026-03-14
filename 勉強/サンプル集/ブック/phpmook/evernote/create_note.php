<?php
require_once ("vendor/autoload.php");

use Evernote\Client;
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
 
 // 簡単なノートの作成
 $newNote = new Note();
 $newNote->title = "初めてのノート登録";
 $newNote->notebookGuid = $_GET['notebook_guid'];
 $newNote->content = '<?xml version="1.0" encoding="UTF-8" ?>' 
   .'<!DOCTYPE en-note SYSTEM "http://xml.evernote.com/pub/enml2.dtd">' 
   .'<en-note><div>本文をこちらに設定</div></en-note>';
 $noteStore->createNote( $token, $newNote );
 header('Location: index.php');
}

?>