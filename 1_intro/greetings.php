<?php

var_dump($_GET);

$name = $_GET['name'];
$lastname = $_GET['lastname'];

$greetings = "Ciao $name $lastname";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Greetings</title>
</head>
<body>

<h1><?php echo $greetings; ?></h1>

</body>
</html>