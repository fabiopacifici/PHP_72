<?php


trait Weightable
{

  protected $weight;


  public function set_weight(int $weight, string $unit)
  {
    $this->weight = $weight . $unit;
  }
  public function get_weight()
  {
    return $this->weight;
  }
}
