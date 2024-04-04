<?php
  session_start();
  if (isset($_GET['signout'])) {
    echo "Signing out..";
    session_destroy();
    header("location:index?signout=true");
  }
?>
