<?php
require_once __DIR__ . '/Product.php';
class Food extends Product
{
  public function __construct($name, $price, $is_available,  $quantity, Category $category, protected $calories = '100')
  {
    parent::__construct($name, $price, $is_available, $quantity, $category);
    $this->calories = $calories;
  }
  /* TODO: add getters and setter for calories */
}
