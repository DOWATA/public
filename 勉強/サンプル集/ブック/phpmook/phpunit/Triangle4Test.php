<?php
require_once 'Triangle.class.php';

class Triangle4Test extends PHPUnit_Framework_TestCase {

  /**
    * @expectedException IlligalArgumentException
    * @expectedExceptionMessage 引数width／heightが数値でありません
    * @expectedExceptionCode 10
    */
  public function testArea() {
    $t = new Triangle('あいう', 10);
  }
}