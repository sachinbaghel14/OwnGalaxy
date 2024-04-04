<?php
  include_once('imports/dbcon.inc');
  if (isset($_GET['item'])) {
    $cartid = $_GET['item'];
    echo $cartid;
    $query = "DELETE FROM cart WHERE cart_id = $cartid";
    mysqli_query($con,$query);
    header("Refresh:0; url=cart");
  }
?>
