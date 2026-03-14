<?php
require_once 'Triangle.class.php';

class TriangleTest extends PHPUnit_Framework_TestCase {
  protected $t;

  public function setUp() {
    $this->t = new Triangle(10, 5);
  }

  public function testDummy() {
    $this->markTestIncomplete('テストは未実装です。');
}}