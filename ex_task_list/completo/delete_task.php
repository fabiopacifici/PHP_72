<?php
//var_dump($_POST);
include __DIR__ . '/functions.php';
if (isset($_POST['post_index'])) {
  // get all data as an array
  $tasks = read_data('tasks.json');
  //var_dump(count($tasks));
  // remove the element in the desided position
  array_splice($tasks, $_POST['post_index'], 1);

  // rebuild the array in json
  echo rebuild_json($tasks);
  //var_dump($tasks);
  //echo file_get_contents('tasks.json');
}
