<?php

require_once __DIR__ . '/../Traits/Weightable.php';

class Person
{
  use Weightable;
  public function __construct($name)
  {
    $this->name = $name;
  }
}
