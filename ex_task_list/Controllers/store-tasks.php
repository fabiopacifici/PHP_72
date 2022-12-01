<?php
require __DIR__ . '/../functions.php';
// Check if the tasks title is not null
// #1 Controllo se il titolo della la task é presente nel get 
if (isset($_POST['title'])) {

  // create a new task array
  //#2 creo la nuova task come array associativa
  $task = [
    'title' => $_POST['title'],
    'done' => false
  ];
  /* TODO: refactor in a function */
  // read the json file and return it as an assoc array
  //#3 leggo il file json e lo restituisco come un array associativa
  $tasks_array = read_data('../tasks.json');

  // push the new task in the task array
  // #4 pusho la nuova task nell'array associativa recuperata la punto 3
  array_unshift($tasks_array, $task);

  /* TODO:  refactor into a functino */
  // transform the tasks array into a json
  // 5# ritrasform l'array di tasks recuperata al punto #3 in json
  $tasks_json = json_encode($tasks_array);
  //var_dump($tasks_json);
  // update the json file using file_put_contents
  // #6 Aggiorno il file json inserendo il nuovo contenuto generato al punto #5 
  file_put_contents('../tasks.json', $tasks_json);
  // echo the json file
  // #7 rispondo alla chiamata ajax con un risultato json 
  header("Content-Type: application/json");
  echo $tasks_json;
} else {
  echo 'Error';
}
