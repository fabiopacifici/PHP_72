<?php


class Membership
{
  protected $name;
  protected $price;
  protected $date;

  public function __construct($name, $price, $date)
  {
    $this->name = $name;
    $this->price = $price;
    $this->date = $date;
  }
}
