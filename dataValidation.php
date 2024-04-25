<?php
function validatePasword($password){
  $req1 = strlen($password) >= 8; // Check for length
  $req3 = preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password); // Check for upper and lower case
  $req4 = preg_match('/[0-9]/', $password); // Check for numbers
  $req5 = preg_match('/[^a-zA-Z\d]/', $password); // Check for special characters

  return $req1 && $req3 && $req4 && $req5;
}

function validateEmail($email){
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}
