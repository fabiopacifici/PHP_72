<?php 

function check_email_address($email){

  if (str_contains($email, '@') && str_contains($email, '.')) {
    var_dump('Email Valida');
    $status = 'success';
    $message = 'Email Valida';
    $is_valid = true;

  } else {
    var_dump('Email non valida');
    $status = 'danger';
    $message = 'Email Invalida';
    $is_valid = false;

  }

  return ['status' => $status, 'message' => $message, 'is_valid' => $is_valid];
}