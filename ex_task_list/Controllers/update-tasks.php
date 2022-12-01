<?php
require __DIR__ . '/../functions.php';

if (isset($_POST['task_index']) && isset($_POST['done'])) {
  $task_index = $_POST['task_index'];
  $task_status = boolval($_POST['done']);
  // read the json file and transform it as an assoc array
  $tasks_array = read_data('../tasks.json');
  //var_dump($tasks_array);
  $tasks_array[$task_index]["done"] = $task_status;
  //var_dump($tasks_array);
  header("Content-Type: application/json");
  echo tranform_array_to_json_and_save($tasks_array, '../tasks.json');
}
