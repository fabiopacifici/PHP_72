<?php

class User
{
  public $name;
  public $lastname;
  public $age;
  public $addresses;


  public function __construct($name, $lastname, $age, array $addresses)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->addresses = $addresses;


    foreach ($addresses as $address) {
      // check if the variable address is an instance of the Address class
      if (!$address instanceof Address) {
        echo 'Address data type incorrect! every address must be an instance of the Address class';
        die;
      }
    }
  }

  public function getAddressDetails(Address $address)
  {

    $street = $address->street;
    $city = $address->city;
    $post_code = $address->post_code;

    return "$street $city $post_code";
  }
}
