<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


$do_logout = boolval($_POST['logout']);

if ($do_logout) {
  // destroy the session
  //var_dump('destroy session');
  session_destroy();
  // redirect the user back
  header('Location: /index.php?logout=success');
}
