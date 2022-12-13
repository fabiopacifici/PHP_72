<?php


require_once __DIR__ . '/User.php';



class PremiumUser extends User
{
  protected $membership;

  public function __construct($name, $lastname,  Membership $membership)
  {
    parent::__construct($name, $lastname);
    $this->membership = $membership;
  }

  /* add a polimorph method */

  public function set_discount()
  {
    if ($this->get_age() < 35) {
      $this->discount = 20;
    } else {
      $this->discount = 10;
    }
  }
}
