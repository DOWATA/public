<?php
require_once 'Triangle.class.php';

class Triangle5Test extends PHPUnit_Framework_TestCase {

  public function testArea() {
    $this->expectOutputString(25);
    $t = new Triangle(10, 5);
    print($t->getArea());
  }
}