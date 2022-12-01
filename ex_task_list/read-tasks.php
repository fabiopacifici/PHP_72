<?php

$tasks = file_get_contents('tasks.json');

//var_dump($tasks);
header("Content-Type: application/json");

echo $tasks;
