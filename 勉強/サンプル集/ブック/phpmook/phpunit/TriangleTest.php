<?php
require_once 'Triangle.class.php';

class TriangleTest extends PHPUnit_Framework_TestCase {
  protected $t;

  public function setUp() {
    $this->t = new Triangle(10, 5);
  }

  public function testArea() {
    $this->assertInstanceOf('Triangle', $this->t,
      'triangle isnt Triangle instance');
    $this->assertEquals(25, $this->t->getArea(),
      'triangle area is uncorrect');
  }
}