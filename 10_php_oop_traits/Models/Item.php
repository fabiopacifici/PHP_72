<?php

class Item
{
  public function __construct(protected String $name)
  {
    $this->name = $name;
  }
}
