<?php
/* 
$tasks = [
  "Learn PHP",
  "Learn Mysql",
  "Learn Laravel",
  "Read a book"
]; */

$tasks_string = file_get_contents('tasks.json');
//var_dump($tasks_string);
$tasks_array = json_decode($tasks_string);
//var_dump($tasks_array);



if (isset($_POST['task'])) {

  $task = $_POST['task'];


  // pusho nell'array di tasks 
  array_push($tasks_array, $task);
  //var_dump($tasks_array);
  $json_tasks = json_encode($tasks_array);
  //var_dump($json_tasks);
  file_put_contents('tasks.json', $json_tasks);
}



header('Content-Type: application/json');
echo json_encode($tasks_array);
