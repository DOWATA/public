<?php
require_once 'Triangle.class.php';

class Triangle3Test extends PHPUnit_Framework_TestCase {
  public function data() {
    return array(
      array(new Triangle(10, 5), 25),
      array(new Triangle(20, 3), 30),
      array(new Triangle(30, 2), 30)
    );
  }

  /**
   * @dataProvider data
   */
  public function testArea(Triangle $t, $result) {
    $this->assertEquals($result, $t->getArea(), 'triangle area is uncorrect');
  }
}