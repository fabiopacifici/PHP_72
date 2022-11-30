<?php
/* 

Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. 


Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale


Milestone 3 (BONUS)

- Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

- Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli.
Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). 



*/
include __DIR__  . '/functions.php';

if (isset($_GET['password_length'])) {
  $length = $_GET['password_length'];
  $result = generate_password($length);
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Password Generator</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="d-flex flex-column align-items-center justify-content-center bg-light vh-100 ">


  <main class="">

    <h1>Strong Password Generato</h1>
    <h3>Genera una password</h3>

    <?php if (isset($_GET['password_length'])) : ?>
      <div class="alert alert-<?= $result['class'] ?>" role="alert">
        <strong>Password: </strong> <?= $result['result']; ?>
      </div>
    <?php endif; ?>

    <form action="index.php" method="get">
      <div class="mb-3">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="duplicates" id="duplicates" value="true">
          <label class="form-check-label" for="duplicates">
            Yes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="duplicates" id="duplicates" value="false" checked>
          <label class="form-check-label" for="duplicates">
            No
          </label>
        </div>

        <label for="password_length" class="form-label">Password Length</label>
        <input type="number" name="password_length" id="password_length" class="form-control" placeholder="" aria-describedby="helperPasword" minlength="8" maxlength="32">
        <small id="helperPasword" class="text-muted">Type a password min 8 max 32 chars</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-secondary">Reset</button>
    </form>

  </main>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>