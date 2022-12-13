<?php

class ShoppingBasket
{
  protected $products = [];
  public function __construct(protected Customer $customer)
  {
    $this->customer = $customer;
  }


  public function add(Product $product, $quantity)
  {
    // prendere il prodotto passato alla funzione
    // salvarlo in una proprietá che contiente tutti i prodotti.
    array_unshift(
      $this->products,
      [
        'product' => $product->getName(),
        'amount' => $quantity * $product->getPrice(),
        'total_quantity' => $quantity

      ]
    );
  }

  public function getProducts()
  {
    # code...
    return $this->products;
  }

  public function getTotal()
  {
    $total = array_map(function ($product) {
      return $product['amount'];
    }, $this->products);
    //var_dump($total);

    /* TODO: Calcola il totale finale incluso lo sconto quando l'utente é registrato */
    $total_amount = array_sum($total);
    $customer_discount = $this->customer->getDiscount();

    return ($customer_discount > 0) ? $total_amount - $total_amount * $customer_discount / 100 : $total_amount;
  }
}
