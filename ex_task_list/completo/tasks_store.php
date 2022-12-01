<?php
require __DIR__ . '/functions.php';
// check if title isset in the POST requesst
if (isset($_POST['title'])) {

  //var_dump($_POST['title']);
  // define a new array with the task title 
  $task = [
    'title' => $_POST['title'],
    'done' => false,
  ];

  // read the json file with file_get_contents
  //$tasks_json = file_get_contents('tasks.json');

  // transform the string in an ass array
  //$tasks_array = json_decode($tasks_json, true);
  $tasks_array = read_data('tasks.json');
  // push the task in the array
  array_unshift($tasks_array, $task);

  //encode the tasks array  
  $json_tasks = json_encode($tasks_array);

  //store all tasks back in the db tasks.json file
  file_put_contents('tasks.json', $json_tasks);

  // read and return alltasks to the request
  header('Content-Type: application/json');
  // retrn all tasks as json
  echo file_get_contents('tasks.json');
} else {
?>
  <h2>NOT AUTHORIZED</h2>
<?php
}
