<?php
require('config/db_conn.php');
require('config/config.php');
include 'dataValidation.php';
$alert = false;
$succes = false;
$alertText = '';

if (filter_has_var(INPUT_POST, 'submit')) {
  $email = trim(htmlspecialchars($_POST['email']));
  $password = trim(htmlspecialchars($_POST['password']));

  if(validateEmail($email) && validatePasword($password)){
    $query = "select * from users where email='$email';";
    $reuslt = mysqli_query($connect, $query);
  
    $posts = mysqli_fetch_all($reuslt, MYSQLI_ASSOC);
  
    $db_password = $posts[0]['password'];
  
    mysqli_free_result($reuslt);
    mysqli_close($connect);
  
    if($password === $db_password){
      $alert = false;
      $succes = false;
      
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['userId'] = $posts[0]['id'];
      header('Location: ' . ROOT_URL);
      exit();
    }else{
      $succes = false;
      $alert = true;
      $alertText = "Invalid email or password";
    }
  } elseif (!validateEmail($email)) {
    $succes = false;
    $alert = true;
    $alertText = 'Email is not valid';
  } elseif (!validatePasword($password)) {
    $succes = false;
    $alert = true;
    $alertText = 'Password is not valid';
  }
}

?>

<?php require 'inc/header.php'; ?>
  <h1 class="banner">Log in your account</h1>

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>


    <div class="text-center">
      <a href="registration.php">
        <button type="button" class="btn btn-secondary">Go to registration</button>
      </a>
        <button class="btn btn-primary" type="submit" name="submit">LOGIN</button>
    </div>

    <?php if ($alert || $succes) : ?>
      <div class="alert <?php echo $succes ? 'alert-success' : 'alert-danger' ?>">
        <?php echo $alertText; ?>
      </div>
    <?php endif; ?>
    </div>
  </form>
</body>
</html>