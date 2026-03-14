<?php
// (1) モデルの定義
class Info extends AppModel {
  // (2) 設定の選択
  public $useDbCofig = 'mook';
  // (3) テーブル名の指定
  public $useTable = 'info';
  /// (4) 入力チェック
  public $validate = array(
    'title' => array(
      'required' => true,
    ),
    'body' => array(
      'required' => true
    )
  );
  
  public function getTodayList($num = 10){
    // (5) 条件での一覧取得方法
    $opts = array(
      'conditions' => array(
        'info.created <=' => date('Y-m-d',strtotime("+1 day")),
        'info.created >=' => date('Y-m-d')
      ),
      'order' => array('info.created ASC'),
      'limit' => $num
    );
    $data = $this->find('all',$opts);
    return $data;
  }
  
  public function getByTitle($title){
    // (6) 最初の1件だけを取得
    $opts = array(
      'conditions' => array(
        'info.title LIKE' => '%'.$title.'%'
      )
    );
    $row = $this->find('first',$opts);
    return $row;
  }
}
?>