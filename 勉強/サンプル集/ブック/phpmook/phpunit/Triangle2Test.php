<?php
require_once 'Triangle.class.php';

class Triangle2Test extends PHPUnit_Framework_TestCase {
  public function testInstance() {
    $t = new Triangle(10, 5);
    $this->assertInstanceOf('Triangle', $t, 'triangle isnt Triangle instance');
    return $t;
  }

  /**
    * @depends testInstance
    */
  public function testArea(Triangle $t) {
    $this->assertEquals(25, $t->getArea(), 'triangle area is uncorrect');
  }
}