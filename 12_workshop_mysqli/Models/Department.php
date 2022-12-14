<?php
require_once __DIR__ . '/../DB.php';
class Department
{
  public static function all()
  {
    // connect with the db
    $connection = DB::connect();
    // make the SQL query and save the result
    $results = $connection->query('SELECT * FROM `departments`');
    //var_dump($results);
    // close the connection
    DB::disconnect($connection);
    // return the results
    return $results;
  }
}
