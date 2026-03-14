<style>
<!--
.enml{
  border: 1px solid #666666;
  margin: 5px;
  padding: 0.5em;
}
-->
</style>
<?php
// 必要なライブラリの読み込み
require_once ("vendor/autoload.php");

// (1) 利用するクラスをNamespaceなしでアクセスできるように設定
use Evernote\Client;
use EDAM\NoteStore\NoteFilter;
use EDAM\Types\Note;
use EDAM\NoteStore\NoteStoreIf;
use EDAM\Types\Notebook;
use EDAM\Types\Resource;
use EDAM\Types\Data;
use EDAM\NoteStore\NotesMetadataResultSpec;

session_start();
if($_SESSION['ACCESS_TOKEN']){
 $accessToken = $_SESSION['ACCESS_TOKEN'];
 
 // (2) アクセストークンの設定
 $token = $accessToken['oauth_token'];
 $evernote = new Client( array (
   'token' => $token 
 ) );
 // (3) ノートにアクセスするためのオブジェクトを取得
 $noteStore = $evernote->getNoteStore();
 $noteStore instanceof NoteStoreIf;
 
 // (4) ノートブックの一覧を取得する
 $notebooks = $noteStore->listNotebooks();
 foreach( $notebooks as $notebook ){
  $notebook instanceof Notebook;
  $guid = $notebook->guid;
  
  // (5) 最大10件でノートを条件なしで取得する
  $resultSpec = new NotesMetadataResultSpec();
  $resultSpec->includeTitle = true;
  $filter = new NoteFilter();
  $filter->notebookGuid = $guid;
  $list = $noteStore->findNotesMetadata($token, $filter, 0, 10, $resultSpec);
  
  $start = $list->startIndex;
  $total = $list->totalNotes;
  $notes = $list->notes;
  print sprintf( "<h2>[ノートブック]:%s</h2>", $notebook->name );
  
  foreach( $notes as $item ){
   // (6) ノートを取得する
   $withContent = true;
   $withResourcesData = true;
   $withResourcesRecognition = false;
   $withResourcesAlternateData = false;
   $note = $noteStore->getNote( $token, $item->guid, $withContent, $withResourcesData, $withResourcesRecognition, $withResourcesAlternateData );
   $note instanceof EDAM\Types\Note;
   $enml_xml = $note->content;
   
   print sprintf( "<h3>[ノート]:%s</h3>", $note->title );
   print sprintf( '<a href="delete_note.php?note_guid=%s">削除</a>', urlencode( $item->guid ) );
   print "\n<br />";
   print "<div class='enml'>" . htmlspecialchars( $enml_xml ) . "</div>\n";
   
   if($note->resources){
    foreach( $note->resources as $res ){
     $res instanceof Resource;
     // (7) 添付されている画像がある場合には、それを表示する
     print sprintf( "<img src='data:image/png;base64,%s'>", base64_encode( $res->data->body ) );
    }
   }
  }
 }
}
?>