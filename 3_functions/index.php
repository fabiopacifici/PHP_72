<?php

# Function declaration

function nome_funzione($param1, $param2){
  // code here ..
}



function reverseWord($word){
  //var_dump($word);
  return strrev($word);
}


# Invoke a function

$revWord = reverseWord('Fabio');
var_dump($revWord);

/**
 * Die and Dump
 */
function dd(...$params){
  var_dump($params);
  foreach ($params as $param) {
    var_dump($param);
  }
  die;
}

//dd(4, 5, 'string', ['ciao', 1, 2]);


# Function scope
$now = 2023;
function calcAge($yob){
  # Function scope
  $name = 'Fabio';
  $now = 2022;
  var_dump($now); // Variable undefined
  var_dump($name);
  var_dump($yob);
}
var_dump($now);
calcAge(1980);
