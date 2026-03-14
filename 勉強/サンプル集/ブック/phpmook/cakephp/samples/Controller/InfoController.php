<?php
// コントローラクラスの定義 (1)
class InfoController extends AppController {
 
 // 使用するモデル（テーブル）の定義 (2)
 public $uses = array('Info');
 
 // デフォルトのアクション (3)
 public function index(){
  $list = $this->Info->find('all');
  $this->set('list',$list);
  // 表示するビューの指定 (4)
  $this->render('index');
 }
 // レコードの追加アクション (5)
 public function add(){
  if(!$this->request->is('post')){
   $this->render('add');
   return;
  }
  
  $data = array(
    'Info' => array(
      // リクエストパラメータの取得
      'title' => $this->request->data('Info.title'),
      'body'  => $this->request->data('Info.body')
    )
  );
  // テーブルの追加処理 (6)
  $this->Info->save($data);
  // メッセージの表示とURLのリダイレクト処理 (7)
  $this->Session->setFlash("追加しました");
  $this->redirect('/info/index');
 }
 // レコードの削除アクション (8)
 public function del($id){
  $this->Info->delete($id);
  $this->Session->setFlash("削除しました");
  $this->redirect('/info/index');
 }
 
 public function today(){
   $list = $this->Info->getTodayList();
   $this->set('list',$list);
   $this->render('index');
 }
 
 public function title(){
   $list = $this->Info->getByTitle("ピアノ");
   $this->set('list',$list);
   $this->render('index');
 }
}
?>