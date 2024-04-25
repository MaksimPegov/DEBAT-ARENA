<?php
session_start();

$isLoggedIn = $_SESSION['userId'] ? true : false;

if(isset($_POST['action'])){
  if($isLoggedIn){
    session_destroy();
    header('Location: login.php');
    exit();
  }else{
    header('Location: login.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Debat arena</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="index.php">DEBAT ARENA</a>
  <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>>
    <button class="logout-bnt btn btn-light" type="submit" name="action">
      <?php echo $isLoggedIn ? "Logout" : "Authorization"; ?>
    </button>
  </form>
</nav>