<?php
include 'dataValidation.php';
$alert = false;
$succes = false;
$alertText = '';

if (filter_has_var(INPUT_POST, 'submit')) {
  $login = trim(htmlspecialchars($_POST['login']));
  $password = trim(htmlspecialchars($_POST['password']));

  if(validateUsername($login) && validatePasword($password)){
    $succes = true;
    $alertText = 'Login successful';
  } elseif (!validateUsername($login)) {
    $alert = true;
    $alertText = 'Login is not valid';
  } elseif (!validatePasword($password)) {
    $alert = true;
    $alertText = 'Password is not valid';
  }
} 

?>

<?php require 'inc/header.php'; ?>
  <h1 class="banner">Log in your account</h1>

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <div class="form-group">
      <label for="login">Login</label>
      <input type="text" class="form-control" id="login" name="login" placeholder="Enter your login">
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