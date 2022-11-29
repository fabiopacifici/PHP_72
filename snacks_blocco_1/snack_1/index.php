<?php 

/* 

Creiamo un array contenente le partite di basket di un’ipotetica tappa del calendario. Ogni array avrà una squadra di casa e una squadra ospite, punti fatti dalla squadra di casa e punti fatti dalla squadra ospite. Stampiamo a schermo tutte le partite con questo schema.

Olimpia Milano - Cantù | 55-60

*/

$matches = [
  [
    'home_team' => 'Lakers',
    'guest_team' => 'Cicago bulls',
    'home_points' => 10,
    'guest_points' => 5
  ],
  [
    'home_team' => 'Lakers2',
    'guest_team' => 'Cicago bulls2',
    'home_points' => 20,
    'guest_points' => 25
  ],
  [
    'home_team' => 'Lakers3',
    'guest_team' => 'Cicago bulls3',
    'home_points' => 15,
    'guest_points' => 5
  ],
  [
    'home_team' => 'Lakers4',
    'guest_team' => 'Cicago bulls4',
    'home_points' => 30,
    'guest_points' => 15
  ]
];

var_dump($matches);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snack 1 Basket calendar</title>
</head>
<body>

<ul>
  <?php foreach ($matches as $match) : ?>
    <li> <?php echo $match['home_team'] . '-' . $match['guest_team']?> | <?php echo $match['home_points'] . '-' . $match['guest_points'] ?></li>
  <?php endforeach; ?>
</ul>


</body>
</html>