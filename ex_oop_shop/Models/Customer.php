<?php


class Customer
{

  protected $paymentMethod = null;

  public function __construct(protected String $name, protected String $email, protected String $address, protected  Bool $is_registerd = false, protected Int $discount = 0)
  {
    $this->name = $name;
    $this->email = $email;
    $this->address = $address;
  }


  public function insertCreditCard(CreditCard $card)
  {
    $this->paymentMethod = $card;
    return $this->paymentMethod;
  }

  public function makePayment($amount)
  {
    // check if creadit card is expired 
    //var_dump($this->paymentMethod);

    $card_ex_year = $this->paymentMethod->exp_year;
    $card_ex_month = $this->paymentMethod->exp_month;
    $current_year = date('Y');
    $current_month = date('m');



    /* TODO: Review this implementation */
    if ($card_ex_year < $current_year || $card_ex_month < $current_month && $card_ex_year === $current_year) {
      // Show error message if card is expired
      throw new Exception("Error processing your card! Credit Card Expired.", 1);
    } else {
      // Show a success message
      return "Payment successful! Total amount: $amount$";
    }
  }


  public function setDiscount($discount)
  {
    $this->discount = $discount;
  }

  public function getDiscount()
  {
    return $this->discount;
  }

  public function setRegistrationStatus()
  {
    $this->is_registerd = true;
  }
}
