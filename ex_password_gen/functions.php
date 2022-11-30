<?php

function is_length_invalid($length)
{
  if ($length < 8 || $length > 32) {
    return true;
  }
  return false;
}

function generate_password($password_length)
{

  //Se la lunghezza della password é < a 8 caratteri oppure se ésuperiore a 32 
  // mostro un messaggio di errore
  if (is_length_invalid($password_length)) {
    return ['class' => 'danger', 'result' => 'Error! Password must be between 8 and 32 characters'];
  }

  // creo variabile vuota per la password da generare
  $password = '';
  // genero una lista completa di caratteri generate_characters()
  $characters_list = generate_characters();
  //var_dump($characters_list);
  // ciclare finquando la lunghezza della stringa password non raggiunge la password_lenght desiderata
  while (strlen($password) < $password_length) {
    // ad ogni iterazione, seleziona un carattere dalla lista di caratteri
    $char = $characters_list[rand(0, strlen($characters_list))];
    // prendo il carattere selezionato e lo concateno con la stringa della password 
    //var_dump($_GET['duplicates']); // É una stringa

    if (!str_contains($password, $char) && $_GET['duplicates'] === 'false') {
      //var_dump('Non Voglio duplicati aggiungi il carattere alla password');
      $password .= $char;
    } elseif ($_GET['duplicates'] === 'true') {
      //var_dump('Voglio duplicati');
      $password .= $char;
    }
  }
  return ['class' => 'info', 'result' => $password];
}

function generate_characters()
{
  $alphabet = 'abcdefghilmnopqrstuz';
  $upper_alphabet = strtoupper($alphabet);
  $numbs = '0123456789';
  $symbols = '!~@#?<>{}[]()-=&%$*';

  return $alphabet . $upper_alphabet . $numbs . $symbols;
}
