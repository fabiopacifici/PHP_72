<?php

class Product
{

  public function __construct(protected String $name, protected Float $price, protected Bool $is_available, protected Int $quantity, Category $category)
  {
    $this->name = $name;
    $this->price = $price;
    $this->is_available = $is_available;
    $this->quantity = $quantity;
    $this->category = $category;
  }

  public function getName()
  {
    return $this->name;
  }
  public function getPrice()
  {
    return $this->price;
  }

  public function getClassName()
  {
    return get_class();
  }
}
