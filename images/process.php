<?php
session_start();
include("imports/dbcon.inc");
$email = $_POST['email'];
$pass = $_POST['password'];
    if(isset($_POST['login'])){
      $sql = "SELECT * FROM users WHERE password = '$pass' && email = '$email'";
      $result = mysqli_query($con,$sql);
      if($row = mysqli_fetch_assoc($result)){
          $name = $row['user'];
          $_SESSION['user']=$name;
          header("location:index.php");
       }
        else {
      header("location:signin.php?signin=unsuccessful");
     }
    }
    else {
      echo "Something went wrong :/";
    }
?>
