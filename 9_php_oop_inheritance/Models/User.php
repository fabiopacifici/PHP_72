<?php

class User
{

  protected $discount;
  private $age;

  public function __construct(public String $name, public String $lastname)
  {
    $this->name = $name;
    $this->lastname = $lastname;
  }


  public function get_fullname()
  {
    return "$this->name $this->lastname";
  }


  public function set_age($age)
  {
    $this->age = $age;
  }

  public function get_age()
  {
    return $this->age;
  }


  public function set_discount()
  {
    if ($this->age > 50) {
      $this->discount = 20;
    } else {
      $this->discount = 0;
    }
  }

  public function get_discount()
  {
    # code...
    return "$this->discount %";
  }
}
