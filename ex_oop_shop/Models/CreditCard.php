<?php

class CreditCard
{
  public function __construct(public String $number, public String $ccv, public String $exp_month, public String $exp_year)
  {
    $this->number = $number;
    $this->ccv = $ccv;
    $this->exp_month = $exp_month;
    $this->exp_year = $exp_year;
  }
}
