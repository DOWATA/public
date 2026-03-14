<?php
class HelloController extends AppController {
 
 public function index(){
  $this->set('name','皆さん');
  $this->render("index");
 }
 
 public function reply(){
  $this->set('name','こちらこそ');
  $this->render('reply');
 }
}

?>