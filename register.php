<?php
  session_start();
  if (isset($_SESSION['user'])) {
?>
<script type="text/javascript">
  window.alert("You're already logged in.");
    window.history.go(-1);
</script>
<?php
  }
  include("imports/dbcon.inc");
 ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include("imports/bootstrap.inc"); ?>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/register.css">

  <title>Register - Own Galaxy</title>
</head>
<body>
  <!-- NAVBAR -->
  <?php include("imports/nav.inc"); ?>
  <!-- MAIN -->
  <main class="register-form">
    <div class="container">
      <div class="text-center logo-form">
        <img src="images/logo.png" alt="Own Galaxy Logo" height="100" width="300">
        <p>You deserve every bit of this galaxy.</p> <br>
        <h2>Registration form</h2>
      </div>
      <form action="register.php" method="post">
        <div class="register">
          <div class="row">
            <div class="col-sm-6">
              <label for="firstName">First Name</label>
              <input type="text" name="firstNameInput" id="firstName" placeholder="First Name" required> <br>
            </div>
            <div class="col-sm-6">
              <label for="lastName">Last Name</label>
              <input type="text" name="lastNameInput" id="lastName" placeholder="Last Name" required> <br>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <label for="city">City</label>
              <input type="text" name="cityInput" id="city" placeholder="City" required> <br>
            </div>
            <div class="col-sm-5">
              <label for="state">State</label>
              <input type="text" name="stateInput" id="state" placeholder="State" required> <br>
            </div>
            <div class="col-sm-3">
              <label for="zip">Zip</label>
              <input type="text" name="zipInput" id="zip" placeholder="Zip" required> <br>
            </div>
          </div>
          <label for="phone">Phone Number (+91) </label><small> [Please don't put country code.]</small>
          <input type="tel" id="phone" name="phoneInput" pattern="[0-9]{10}" maxlength="10" required>
          <label for="gender">Gender</label>
          <select name="genderInput" id="gender">
            <option value="female">Female</option>
            <option value="male">Male</option>
            <option value="other">Other</option>
          </select>
          <label for="email">Email</label>
          <input type="email" name="emailInput" id="email" placeholder="Email Address" required> <br>
          <label for="password">Password</label>
          <input type="password" name="passwordInput" id="password" placeholder="Password" maxlength="24" required>
        </div><br>
        <input type="checkbox" id="terms" name="termsInput" value="terms" required>&nbsp;<label for="terms">I agree to the <a href="privacy.php" target="_blank">Terms and Conditions</a> </label><br>
        <small>Already have an account? <a href="login.php">Login</a>. </small><br><br>
        <input type="submit" name="registerInput" value="Register"><br><br>
        <?php
          if (isset($_POST['registerInput'])) {
          $fname = htmlspecialchars(trim($_POST['firstNameInput']));
          $lname = htmlspecialchars(trim($_POST['lastNameInput']));
          $city = htmlspecialchars(trim($_POST['cityInput']));
          $state = htmlspecialchars(trim($_POST['stateInput']));
          $zip = htmlspecialchars(trim($_POST['zipInput']));
          $phone = htmlspecialchars(trim($_POST['phoneInput']));
          $gender = htmlspecialchars(trim($_POST['genderInput']));
          $email = htmlspecialchars(trim($_POST['emailInput']));
          $pass = htmlspecialchars(trim($_POST['passwordInput']));
          if ($select = mysqli_query($con, "SELECT `user_email` FROM `user` WHERE `user_email` = '".$_POST['emailInput']."'") or exit(mysqli_error($con))) {
            if(mysqli_num_rows($select)) {
                echo "<p class='lead'>This email is already in use. Please Login.</p>";
            }
            else{
              $sql = "INSERT INTO user (user_fname, user_lname, user_city, user_state, user_zip, user_phone, user_gender, user_email, user_password) VALUES ('$fname','$lname','$city','$state','$zip',$phone,'$gender','$email','$pass')";
              $retval = mysqli_query($con,$sql);
              echo "<p class='lead'>Sign up successful. Please <strong> <a href='login.php' onmouseover='this.style.color:black' onmouseout='this.style.color:black'>Sign In.</a></strong></p>";
            }
          }
        }
      ?>
      </form>
    </div>
  </main>
  <!-- FOOTER -->
  <?php include("imports/footer.inc"); ?>
</body>
</html>

<form action="sidebar.php" method="POST">
  <div class="form-group row">
    <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" value="<?php echo $fname; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputLastName" name="inputLastName" value="<?php echo $lname; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPhoneNumber" class="col-sm-2 col-form-label">Phone Number (+91)</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" value="<?php echo $phone; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $email; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="inputPassword" name="inputPassword" value="xIm42Bsr">
    </div>
  </div>
  <hr class="my-4">
  <legend>Contact Information</legend>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="inputChanges">Save Changes</button>
    </div>
  </div>
</form>
