<?php

function multiplication($int)
{
  if (!is_int($int)) {
    throw new Exception('Is not a number');
  }
  return $int * 5;
}


try {
  var_dump(multiplication('Ciao'));
} catch (Exception $e) {
  var_dump('Eccezione: ' . $e->getMessage());
}
