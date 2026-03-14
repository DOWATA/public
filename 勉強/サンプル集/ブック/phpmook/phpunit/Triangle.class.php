<?php
class Triangle {
  private $_width;
  private $_height;

  public function __construct($width, $height) {
    if (!is_numeric($width) || !is_numeric($height)) {
      throw new IlligalArgumentException('引数width／heightが数値でありません', 10);
    }
    $this->_width  = $width;
    $this->_height = $height;
  }

  public function getArea() {
    return $this->_width * $this->_height / 2;
  }
}

class IlligalArgumentException extends Exception { }