<?php
require __DIR__ . '/../functions.php';
if (isset($_POST['task_index'])) {
  // recupero l'index del post
  $task_index = $_POST['task_index'];
  // recuperare l'array di tasks
  $tasks = read_data('../tasks.json');
  // rimuovo l'elemento in posizione index con splice
  array_splice($tasks, $task_index, 1);

  header("Content-Type: application/json");
  echo tranform_array_to_json_and_save($tasks, '../tasks.json');
}
