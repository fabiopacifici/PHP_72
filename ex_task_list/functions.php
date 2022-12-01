<?php

function read_data($file)
{
  $tasks_json = file_get_contents($file);
  return json_decode($tasks_json, true);
}


function tranform_array_to_json_and_save($tasks_array, $file)
{
  // transform the tasks array into a json
  $tasks_json = json_encode($tasks_array);
  // update the json file using file_put_contents
  file_put_contents($file, $tasks_json);
  // return the json string
  return $tasks_json;
}
