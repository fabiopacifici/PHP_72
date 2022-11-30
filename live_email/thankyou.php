<?php
include __DIR__ . '/layout/head.php';
include __DIR__ . '/partials/header.php';


session_start();

if (!empty($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $status = $_SESSION['status'];
  $message = $_SESSION['message'];
}
?>
<main>
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Grazie per l'iscrizione!!</h1>

      <div class="alert alert-<?= $status; ?>" role="alert">
        <strong><?= $message ?></strong> Complimenti per l'iscrizione!
      </div>


      <p class="col-md-8 fs-4">Ti sei iscritto con la seguente email: [<?= $email ?>] Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, quasi!</p>
      <a class="btn btn-primary btn-lg" href="/">Go Back</a>
    </div>
  </div>
</main>

<?php
include __DIR__ . '/layout/footer.php';/*  */