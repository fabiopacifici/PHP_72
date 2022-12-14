<?php
require_once __DIR__ . '/../DB.php';

class User
{


  public static function find($username, $md5password)
  {
    $connection = DB::connect();
    // prepare the sql query
    $statement = $connection->prepare("SELECT `id`, `username` from `users` WHERE `username` = ?  AND `password` = ?");
    //var_dump($statement);
    // bind all params before exectiung the query
    $statement->bind_param('ss', $username, $md5password);
    // Execute the query
    $statement->execute();
    //var_dump($statement);
    // get all results
    $result = $statement->get_result();
    DB::disconnect($connection);
    //var_dump($result);
    // read the results number
    $num_rows = $result->num_rows;
    //var_dump($num_rows);
    if ($num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
      //var_dump($row);
    }
    return false;
  }
}
