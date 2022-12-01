<?php

function read_data($file): array
{

  // read the json file with file_get_contents
  $tasks_json = file_get_contents($file);

  // transform the string in an ass array
  $tasks_array = json_decode($tasks_json, true);
  return $tasks_array;
}

function rebuild_json($tasks)
{
  //encode the tasks array  
  $json_tasks = json_encode($tasks);

  //store all tasks back in the db tasks.json file
  file_put_contents('tasks.json', $json_tasks);

  return $json_tasks;
}
