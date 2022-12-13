<?php
/* 
Immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche:

- L'e-commerce vende **prodotti** per animali.
- I prodotti sono categorizzati, le **categorie** sono Cani o Gatti.
- I prodotti saranno oltre al **cibo**, anche **giochi**, **cucce**, etc.

Stampiamo delle card contenenti i dettagli dei prodotti, come immagine, titolo, prezzo, icona della categoria ed il tipo di articolo che si sta visualizzando (prodotto, cibo, gioco, cuccia).

BONUS (Opzionale):

Il **cliente** potrà sia comprare i prodotti come ospite, senza doversi registrarsi nello store, oppure può iscriversi e creare un **account** per ricevere cosi il 20% di sconto.

Il cliente effettua il pagamento dei prodotti nel **carrello** con la **carta di credito**, che non deve essere scaduta.

Models: 
- Product
  - Game
  - Food
- Category
- Customer (bonus)
- Account (bonus)
- ShoppingBasket (bonus)
- CreditCard (bonus)

ESEMPIO API:
- creare nuovo cliente
- aggiungere prodotto al carrello
- calcolare il totale
- effettuare il pagamento

*/

require_once __DIR__ . '/Models/Customer.php';
require_once __DIR__ . '/Models/ShoppingBasket.php';
require_once __DIR__ . '/Models/Product.php';
require_once __DIR__ . '/Models/Food.php';
require_once __DIR__ . '/Models/Game.php';
require_once __DIR__ . '/Models/CreditCard.php';
require_once __DIR__ . '/Models/Category.php';
require_once __DIR__ . '/Models/Account.php';




/*************************
 * GUEST FLOW
 *************************/

#1 creare nuovo cliente
$guest = new Customer('Fabio', 'fabio@fabio.com', '123 fabio drive');
//var_dump($guest);

#2 aggiungere prodotto al carrello
// crea un carrello per l'utente ospite
// crea metodo add() per aggiungere i prodotti
// crea un metodo per recuperare tutti i prodotti get_products()
// crea un metodo per ottenere il totale del carrello get_total()

$guestShoppingBasket = new ShoppingBasket($guest);
//var_dump($guestShoppingBasket);
$guestShoppingBasket->add(new Product('Collare', 12.99, true, 10, new Category('dogs', '')), 2);
$guestShoppingBasket->add(new Food('Crocchette', 18.99, true, 20, new Category('cats', '')), 3);
$guestShoppingBasket->add(new Game('Pallina', 2.99, true, 100, new Category('cats', '')), 5);

$basketProducts = $guestShoppingBasket->getProducts(); // array di oggetti prodotto
//var_dump($basketProducts);


$guestBasketAmount = $guestShoppingBasket->getTotal(); // float  1299.99
var_dump($guestBasketAmount);
#3 Make the payment

$guest->insertCreditCard(new CreditCard('123 123 123 1234', '123', 11, 2023));
//var_dump($guest);

/* Check if the card if not expired */
try {
  $payment_message =  $guest->makePayment($guestBasketAmount);
  echo $payment_message;
} catch (Exception $e) {
  echo $e->getMessage();
}


/***********************
 * Registration Flow
 ***********************/


#1 creare nuovo cliente
$customer = new Customer('Yoda', 'yoda@yoda.com', '123 yoda drive');

$account = new Account($customer, $customer->insertCreditCard(new CreditCard('123 123 123 1234', '123', 11, 2023)));

$account->register($customer);



$customerShoppingBasket = new ShoppingBasket($customer);
//var_dump($customerShoppingBasket);
$customerShoppingBasket->add(new Product('Collare', 12.99, true, 10, new Category('dogs', '')), 2);
$customerShoppingBasket->add(new Food('Crocchette', 18.99, true, 20, new Category('cats', '')), 3);
$customerShoppingBasket->add(new Game('Pallina', 2.99, true, 100, new Category('cats', '')), 5);


$customerBasketAmount = $customerShoppingBasket->getTotal(); // float  1299.99
//var_dump($customerBasketAmount);

/* Check if the card if not expired */
try {
  $payment_message =  $customer->makePayment($customerBasketAmount);
  echo $payment_message;
} catch (Exception $e) {
  echo $e->getMessage();
}



$test_prod = new Product('Collare', 12.99, true, 10, new Category('dogs', ''), 2);
$test_game = new Game('Pallina', 2.99, true, 100, new Category('cats', ''), 5);

var_dump($test_prod->getClassName());
var_dump($test_game->getClassName());
