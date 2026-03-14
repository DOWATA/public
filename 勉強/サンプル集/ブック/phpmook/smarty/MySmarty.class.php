<?php
require 'libs/Smarty.class.php';

class MySmarty extends Smarty {
  private $_db;

  public function __construct() {
    parent::__construct();
    $this->template_dir = './templates';
    $this->compile_dir  = './templates_c';
    $this->config_dir   = './configs';
    $this->cache_dir    = './cache';
    $this->default_modifiers = array('escape:"htmlall"');

    $this->assign('app_title', 'Smartyサンプル');

    try {
      $this->_db = new PDO(
        'mysql:dbname=phpmook;host=127.0.0.1;charset=utf8',
        'mookusr', 'mookpass');
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function getDb() {
    return $this->_db;
  }

  public function d() {
    parent::display(basename($_SERVER['PHP_SELF'], '.php').'.tpl');
  }
}