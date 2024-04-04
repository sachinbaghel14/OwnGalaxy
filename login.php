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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include("imports/bootstrap.inc") ?>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login - Own Galaxy</title>
  </head>
  <body>
    <?php include("imports/nav.inc"); ?>
    <main class="login-form">
      <div class="text-center logo-form">
        <img src="images/logo.png" alt="Own Galaxy Logo" height="100" width="300">
        <p>You deserve every bit of this galaxy.</p> <br>
        <h2>Login</h2>
      </div>
      <div class="container">
        <form action="<?php echo htmlspecialchars('process');?>" method="post">
          <?php
            if (isset($_GET['login'])) {
            $message = $_GET['login'];
            if ($message=="unsuccessful") {
          ?>
          <div class="checkbox mb-3">
          <p style="color:#f7dada">
          <?php
            echo "Invalid email or password";
          ?></p>
          <?php
            }
          }
          ?>
          <div class="login">
            <label for="email">Email</label>
            <input type="email" name="emailInput" id="email" placeholder="Email Address" required>
            <label for="password">Password</label>
            <input type="password" name="passwordInput" id="password" placeholder="Password" required>
          </div><br>
          <input type="checkbox" id="rememberMe" name="rememberMeInput" value="rememberMe">&nbsp;<label for="rememberMe">Remember Me</label><br>
          <small>Don't have an account? <a href="register.php">Register</a>. </small><br><br>
          <input type="submit" name="login" value="Login">
        </form>
      </div>
    </main>
    <?php include("imports/footer.inc"); ?>
  </body>
</html>
