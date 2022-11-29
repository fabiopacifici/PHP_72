<?php

require __DIR__ . '/functions.php';
/* 

1. Controllare che la mail passata in GET sia ben formata e contenga un punto e una chiocciola.
2. Se è corretta stampare un messaggio di success in un alert di Bootstrap, altrimenti (sempre in un alert di Bootstrap) mostrare un messaggio di errore.
Milestone 3: invece di usare una classe statica per lo stile dell’alert, modificarla in base all’esito della funzione. Usare alert-danger in caso di errore e alert-success in caso di esito positivo.

Milestone 4: invece di visualizzare il messaggio di success nella index.php, in caso di esito positivo effettuare un redirect ad una thankyou page.

*/


// check if $_GET['email'] is set
if (isset($_GET['email'])) {
  var_dump($_GET['email']);
  /* 
  if (str_contains($_GET['email'], '@') && str_contains($_GET['email'], '.')) {
    var_dump('Email Valida');
    $status = 'success';
    $message = 'Email Valida';
  } else {
    var_dump('Email non valida');
    $status = 'danger';
    $message = 'Email Invalida';
  } */
  $alert = check_email_address($_GET['email']);

  if ($alert['is_valid']) {
    var_dump('Redirect to a different page');
    header('Location: ./thankyou.php');
  }
  // check if the email contains a @
  // check if the email contains a . 

}

include __DIR__ . '/layout/head.php';
include __DIR__ . '/partials/header.php';

?>

<main>

  <div class="p-5 mb-4 bg-dark text-white rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">My site</h1>
      <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, nisi!</p>
      <button class="btn btn-primary btn-lg" type="button">Click me</button>
    </div>
  </div>
  <!-- Jumbotron -->
  <section>
    <div class="container">
      <h2>About</h2>
      <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem eveniet recusandae dolores perspiciatis hic inventore, unde dicta, nostrum blanditiis incidunt molestiae? Labore aut asperiores a, pariatur architecto odit temporibus distinctio?</p>
    </div>
  </section>


  <?php if (isset($_GET['email'])) : ?>
    <div class="alert alert-<?= $alert['status']; ?>" role="alert">
      <strong><?= $alert['message']; ?></strong>
    </div>
  <?php endif; ?>


  <div class="newsletter bg-info text-white p-5 d-flex justify-content-around">
    <div class="text">
      <h2>Stay tuned</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, voluptas.</p>
    </div>
    <form action="index.php" method="GET">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="abc@mail.com">
        <small id="emailHelpId" class="form-text text-muted">Type your email address</small>
      </div>
      <button type="submit" class="btn btn-primary">Signup</button>
    </form>
  </div>
</main>

<?php

include __DIR__ . '/layout/footer.php';
