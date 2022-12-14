<?php
require_once __DIR__ . '/env.php';
class DB
{

  public static function connect()
  {
    // Connect to the db
    $connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // check if there are errors
    if ($connection && $connection->connect_error) {
      throw new Exception('Database Connection Failed', 1);
    }
    // if no errors return the mysqli object
    return $connection;
  }

  public static function disconnect($connection)
  {
    $connection->close();
  }
}
