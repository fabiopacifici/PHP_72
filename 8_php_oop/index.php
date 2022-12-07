<?php
/* Declare a class */
/* class User
{
  public $name;
  public $email;
  public $type = "Human";
} */

/* Create a new instance */
/* $marco = new User();
$sarra = new User(); */

/* read the object */
/* var_dump($marco);
var_dump($sarra); */

/* read object properties */
/* var_dump($marco->name);
var_dump($sarra->name); */


/* Assign a value to a property */
/* $marco->name = 'Marco';
$sarra->name = 'Sarra'; */

/* var_dump($marco);
var_dump($sarra); */

/* $marco->type = 'Android';
var_dump($marco); */



# Class Methods 
/* class User
{
  public $nome;
  public $sconto = 0;


  public function setSconto($eta)
  {
    if ($eta > 65) {
      $this->sconto = 40;
    }
  }

  public function getSconto()
  {
    return $this->sconto;
  }
}

$filippo = new User(); */
// leggo direttamente le proprietá pubbliche
//var_dump($filippo->sconto);
// scrivo direttamente le proprietá pubbliche
//$filippo->sconto = 10;
//var_dump($filippo->sconto);


//$filippo->setSconto(70);
//$sconto_filippo = $filippo->getSconto(); //0 
//var_dump($sconto_filippo); // 40


/* $fabio = new User();
$fabio_discount = $fabio->getSconto();
var_dump($fabio_discount); // 0
$fabio->setSconto(43);
var_dump($fabio->getSconto()); //0 */



/* Constructor */


/**
 * # Class movie
 * 
 */
class Movie
{

  public $title;
  public $desc;
  public $link;
  /* Define a static prop */
  public static $type = 'Movie';

  /** 
   * @param string $title - a string with the movie name 
   * */
  function __construct($title, $desc, $link)
  {
    $this->title = $title;
    $this->desc = $desc;
    $this->link = $link;
  }

  public static function returnDetails()
  {
    echo 'Movie details';
  }
}

$movie = new Movie('Murder', 'lorem murder', 'https://');
/* Access static prop */
var_dump(Movie::$type);
/* Access stati methods */

Movie::returnDetails();

/* $matrix = new Movie('Matrix', 'lorem matrix', 'https://matrix.com');
$avatar = new Movie('Avatar', 'lorem avatar', 'https://avatar.com');

var_dump($matrix);
var_dump($avatar);
 */



/* LIVE CODING 
Creiamo due classi, una per rappresentare un utente (User) 
ed una per l'indirizzo (Address). 

Poi sfruttiamo la classe Address per effettuare la composizione nel costruttore della classe User.

*/
require __DIR__ . '/Models/User.php';
require __DIR__ . '/Models/Address.php';

// Versione base
//$user = new User('Fabio', 'Pacifici', '42', new Address('Villa esmeralda', 'Costa calma', 'ABCD123'));
//var_dump($user->address->city);


/* Versione bonus */
$addresses = [
  new Address('Villa esmeralda', 'Costa calma', 'ABCD123'),
  new Address('Villa esmeralda 2', 'Costa calma', 'ABCD124'),
];

$user = new User('Fabio', 'Pacifici', '42', $addresses);
var_dump($user);

var_dump($user->addresses);

foreach ($user->addresses as $address) {
  var_dump($user->getAddressDetails($address));
}
