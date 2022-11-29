<?php

/* 
## Snack 2

Con un form passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”
*/
$alert = '<div class="alert alert-primary" role="alert">
  <strong>Please fill the form!</strong>
</div>';

// check if the input fields are empty in the get super global
if(empty($_GET['name']) || empty($_GET['age'] || empty($_GET['email']) )) {
  echo $alert;
} else {
  // the fields have been filled
  // check if the name is at least 3 chars
    if(!strlen($_GET['name'] >= 3)) {
      echo 'Accesso negato';
    } elseif (!str_contains($_GET['email'], '@') && !str_contains($_GET['email'], '.')){
      // check if the email contains the @ and a dot .
      echo 'Accesso negato';
    } elseif(!is_numeric($_GET['age'])){
      echo 'Accesso negato';
    } else {
      echo 'Accesso riuscito';
    }

  // check if the age is a numeric value


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checker</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>

<body>
  <div class="container">
    <h2 class="my-5">Checker</h2>
    <form action="index.php" method="get">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Fabio" aria-describedby="nameHelper">
        <small id="nameHelper" class="text-muted">Type your name here</small>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="fabio@example.com" aria-describedby="emailHelper">
        <small id="emailHelper" class="text-muted">Type your email address</small>
      </div>
      <div class="mb-3">
        <label for="age" class="form-label">age</label>
        <input type="number" name="age" id="age" class="form-control" placeholder="42" aria-describedby="ageHelper">
        <small id="ageHelper" class="text-muted">Type your age here</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-dark">Clear</button>

    </form>
  </div>


</body>

</html>