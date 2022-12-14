<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (!empty($_SESSION['username'])) {
  //echo 'Hi ' . $_SESSION['username'];

  # Get all departments
  require_once __DIR__ . '/Models/Department.php';
  $departments = Department::all();
  //var_dump($departments);
  //var_dump($departments->num_rows);
  //var_dump($departments->num_rows > 0);
  //var_dump($departments->fetch_assoc());

}

?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">DB University</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
            </li>

          </ul>
          <div class="logout">
            <?php if (!empty($_SESSION['userId']) && !empty($_SESSION['username'])) : ?>
              <form action="/logout.php" method="post">
                <input type="text" name="logout" id="logout" value="1" hidden>
                <button type="submit" class="btn btn-outline-primary">Log Out</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>

  </header>


  <main>
    <?php if ($_GET['logout']) : ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Logout: </strong>Hai effettualo il logout con successo
      </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['userId']) && !empty($_SESSION['username'])) : ?>
      <div class="container">


        <!-- Welcome the user -->
        <h3 class="my-4 text-center"><?= 'Welcome ' .  $_SESSION['username'] ?></h3>
        <!-- if/while loop departments->fetch_assoc() -->


        <div class="row">
          <div class="col-12">
            <ul class="list-group">

              <?php if ($departments && $departments->num_rows > 0) :

                while ($department = $departments->fetch_assoc()) : ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>
                      <?= $department['name'] ?>
                    </strong>
                    <span><?= $department['email'] ?></span>
                  </li>

                <?php endwhile; ?>
                <!-- /* case 1 - 0 rows */ -->
              <?php elseif ($departments) : ?>
                <li class="list-group-item">
                  <?= '0 records!'; ?>
                </li>
                <!-- /* case 2 - query error */ -->
              <?php else : ?>
                <li class="list-group-item">
                  <?= 'Ops! Query Erorr.'; ?>
                </li>
              <?php endif; ?>

            </ul>
          </div>
        </div>

      </div>
    <?php else : ?>
      <div class="login mt-5">

        <div class="container">
          <div class="card p-4">
            <h2>Login</h2>

            <form action="login.php" method="post">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="mario" aria-describedby="usernameHelper">
                <small id="usernameHelper" class="text-muted">Type your username here</small>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="passwordHelper">
                <small id="passwordHelper" class="text-muted">Type your password here</small>
              </div>
              <button type="submit" class="btn btn-primary">Log in</button>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>



  </main>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>