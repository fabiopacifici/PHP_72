<?php
/* 

Creiamo due classi:
- una per rappresentare un **Utente** 
- ed una per l’utente Premium. 
- Aggiungiamo una classe **Membership** da passare nel costruttore della sottoclasse **PremiumUser.**

Mostriamo come usare getters e setters per recuperare i valori di proprietá private o protette.

USER:
- name
- lastname
- age
- discount



*/


require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Models/PremiumUser.php';
require_once __DIR__ . '/Models/Membership.php';


$user = new User('Mario', 'Rossi');
$user->set_age(65); // Setta la proprietá age dell'oggetto user che abbiamo instanziato sopra
$user->set_discount(); // setta il valore di discount in base al risultato del metodo.
var_dump($user);


$premium_user = new PremiumUser('John', 'Doe', new Membership('Premium', 100, date('d/m/Y')));

var_dump($premium_user);
$premium_user->set_age(50);

$premium_user->set_discount();
var_dump($premium_user);



$premium_user_2 = new PremiumUser('Jane', 'Doe', new Membership('Premium', 100, date('d/m/Y')));

var_dump($premium_user_2);
$premium_user_2->set_age(30);

$premium_user_2->set_discount();
var_dump($premium_user_2);
