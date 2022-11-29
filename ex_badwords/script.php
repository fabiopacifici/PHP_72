<?php
//var_dump($_GET);

$paragraph = $_GET['paragraph'];
$badword = $_GET['badword'];
$consored_paragraph = str_replace($badword, '***', $paragraph);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Censor</title>
</head>

<body>

  <h2>Paragrafo originale</h2>

  <p><?= "il pagagrafo originale: $paragraph" ?></p>
  <p>Lunghezza totale: <?= strlen($paragraph); ?></p>
                        
  <h2>Paragrafo Censurato</h2>
  <p><?= "il pagagrafo censurato: $consored_paragraph" ?></p>
  <p>Lunghezza totale: <?= strlen($consored_paragraph); ?></p>
</body>

</html>