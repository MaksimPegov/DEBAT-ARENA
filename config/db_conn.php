<?php
  require('./config/config.php');
  $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if(mysqli_connect_errno() !== 0){
    echo "Unable to connect to database" . mysqli_connect_error();
  }
?>