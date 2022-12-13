<?php
require_once __DIR__ . '/Product.php';
class Game extends Product
{
  public function __construct($name, $price, $is_available,  $quantity, Category $category, protected $genre = 'Game')
  {
    parent::__construct($name, $price, $is_available, $quantity, $category);
    $this->genre = $genre;
  }


  public function getClassName()
  {
    return get_class();
  }
  /* TODO: add getters and setter for genre */
}
