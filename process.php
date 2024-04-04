<?php
session_start();
include("imports/dbcon.inc");
if ((isset($_POST['emailInput'])) && (isset($_POST['passwordInput']))) {
  $email = htmlspecialchars(trim($_POST['emailInput']));
  $pass = htmlspecialchars(trim($_POST['passwordInput']));
}
else{
  echo "<h1>404 Not Found</h1>";
  echo "<p style='display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;'>The requested URL was not found on this server.</p>";
  echo "<hr>";
}
if(isset($_POST['login'])){
  $sql = "SELECT * FROM user WHERE user_password = '$pass' && user_email = '$email'";
  $result = mysqli_query($con,$sql);
  if($row = mysqli_fetch_assoc($result)){
    $userid = $row['user_id'];
    $_SESSION['user']=$userid;
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
?>
<script type="text/javascript">
  window.history.go(-1);
</script>
  <?php
  }
  else {
    header("location:login?login=unsuccessful");
  }
}
?>
