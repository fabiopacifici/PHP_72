<?php


class Address
{
  public $street;
  public $city;
  public $post_code;

  public function __construct($street, $city, $post_code)
  {
    $this->street = $street;
    $this->city = $city;
    $this->post_code = $post_code;
  }
}
