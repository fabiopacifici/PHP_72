<?php

class Account
{

  public $discount = 20;
  public function __construct(Customer $customer, CreditCard $card)
  {
    $this->customer = $customer;
    $this->card = $card;
  }


  public function register(Customer $customer)
  {
    $customer->insertCreditCard($this->card);
    $customer->setRegistrationStatus();
    $customer->setDiscount($this->discount);
  }
}
