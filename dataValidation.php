<?php
function validatePasword($password){
  return preg_match('/^[a-zA-Z0-9]*$/', $password) && strlen($password) >= 6;
}

function validateUsername($username){
  return strlen($username) >= 3;
}
