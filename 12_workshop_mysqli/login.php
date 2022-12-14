<?php
// Open a DB connection
//require_once __DIR__ . '/DB.php'; // <-- moved inside User
require_once __DIR__ . '/Models/User.php';
//$connection = DB::connect();
//var_dump($connection);

// Perform a SQL query to find the give user
if (isset($_POST['username']) && isset($_POST['password'])) {
  //var_dump('make the SQL query');
  $username = $_POST['username'];
  // hash the user password
  $md5password = md5($_POST['password']);
  //var_dump($md5password);
  // perform the query and save the results.
  // SELECT `id`, `username` from `users` WHERE `password` = ? AND `username` = ?; 

  // Call the find method on the User class to get user details.
  // The connectio is inside the User model
  $result = User::find($username, $md5password);
  //var_dump($result);
}

// if there is a result save the user inside the $_SESSION
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if ($result) {
  $_SESSION['userId'] = $result['id'];
  $_SESSION['username'] = $result['username'];
} else {
  $_SESSION['userId'] = 0;
  $_SESSION['username'] = '';
}
session_write_close();
// redirect to a get route
//var_dump('Redirect to a GET route');
header('Location: /index.php');
