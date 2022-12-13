<?php

/* 
1.Creiamo una classe Item e tre sottoclassi Product e DigitalProduct e DigitalConsultancy. 

2.Creiamo una classe Person ed estendiamola con la classe User. 

3.Aggiungiamo un trait Weightable nel quale definiamo la proprietá $weight piú un setter ed un getter. 




4.Usiamo il trait nelle classi Product, DigitalProduct, Person. Poi mostriamo come sia Product, che DigitalProduct hanno accesso a quanto definito nel trait ma non Item e DigitalConsultancy. Poi mostriamo anche come Person e tutte le sue sottoclassi hanno accesso a quanto definito nel trit.

*/


require __DIR__ . '/Models/Item.php';
require __DIR__ . '/Models/Product.php';
require __DIR__ . '/Models/DigitalProduct.php';
require __DIR__ . '/Models/DigitalConsultancy.php';
require __DIR__ . '/Models/Person.php';
require __DIR__ . '/Models/User.php';



$desk = new Product('Standing Desk');
$desk->set_weight(100, 'kg');
var_dump($desk->get_weight());


$ebook = new DigitalProduct('Python 3 crash course by me');
$ebook->set_weight(1, 'mb');
var_dump($ebook->get_weight());


$consult = new DigitalConsultancy('Web dev Consultancy');
//$consult->set_weight(1, 'mb');


$john_doe = new Person('John');
$john_doe->set_weight(90, 'kg');
var_dump($john_doe->get_weight());


$jane_doe = new User('John');
$jane_doe->set_weight(90, 'kg');
var_dump($jane_doe->get_weight());
