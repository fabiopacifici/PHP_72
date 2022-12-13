<?php
require_once __DIR__ . '/../Models/Genre.php';
require_once __DIR__ . '/../Models/Movie.php';


$genres = [
  new Genre('Action'),
  new Genre('Fantasy')
];


$black_adam = new Movie('Black Adam', 'Il Mondo aveva bisogno di un eroe. Ha avuto Black Adam.', 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/1g0K701Z1SYJ83A34XvvfnbacTw.jpg', $genres, 120);

$troll = new Movie('Troll', 'L\'incredibile... non è impossibile!', 'https://www.themoviedb.org/t/p/w300_and_h450_bestv2/j8NBvEukRr7LAMbnpTUtXSajXwF.jpg', $genres, 120);


/* var_dump($black_adam);
var_dump($black_adam->get_movie_details());

var_dump($troll);
var_dump($troll->get_movie_details()); */

$movies = [
  $black_adam,
  $troll
];
