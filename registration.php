<?php
include 'dataValidation.php';
$alert = false;
$succes = false;
$alertText = '';

if (filter_has_var(INPUT_POST, 'submit')) {
  $email = trim(htmlspecialchars($_POST['email']));
  $password = trim(htmlspecialchars($_POST['password']));
  $passwordConfirm = trim(htmlspecialchars($_POST['passwordConfirm']));
  $passwordMatch = $password === $passwordConfirm;

  if(validateEmail($email) && validatePasword($password) && $passwordMatch){
    $succes = true;
    $alertText = 'Registration successful';
  } elseif (!validateEmail($email)) {
    $alert = true;
    $alertText = 'Email is not valid';
  } elseif (!validatePasword($password)) {
    $alert = true;
    $alertText = 'Password is not valid';
  } elseif ($password !== $passwordConfirm) {
    $alert = true;
    $alertText = 'Passwords do not match';
  }
} 

?>

<?php require 'inc/header.php'; ?>
  <h1 class="banner">Registrate new account</h1>

  <form class="regForm" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password">
    </div>

    <div class="form-group">
      <label for="password">Confirm password</label>
      <input type="text" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm your password">
    </div>

    <div id="password-req" >
      <h5>Password requirements</h5>
      <ul>
        <li>8 characters</li>
        <li>Uppercase letters</li>
        <li>Lowercase letters</li>
        <li>Numbers</li>
        <li>Special characters</li>
    </div>

    <div class="text-center">
        <a href="login.php">
            <button type="button" class="btn btn-secondary">Go to login</button>
        </a>
      <button class="btn btn-primary" type="submit" name="submit">REGISTRATE</button>
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