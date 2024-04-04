<?php
  // To process orders and add to database
  session_start();
  include_once("imports/dbcon.inc");
  $user_id = $_SESSION['user'];
  // echo "<h1>404 Not Found</h1>";
  // echo "<p style='display: block;margin-block-start: 1em;margin-block-end: 1em;margin-inline-start: 0px;margin-inline-end: 0px;'>The requested URL was not found on this server.</p>";
  // echo "<hr>";
  if (!isset($_SESSION['user'])) {
    // do nothing
  }
  else{
    if (isset($_POST['addToCart'])) {
      $landType = $_POST['type'];
      $landArea = $_POST['area'];
      $certName = $_POST['nameOnCert'];
      $certType = $_POST['certType'];
      $msg = $_POST['msg'];
      $TXN_AMOUNT = $_POST['txnAmt'];
      echo "console.log(".$landType." ".$landArea." ".$certType." ".$certName." ".$msg." ".$TXN_AMOUNT.")";
      try {
        $fetchQuery = "SELECT * FROM cart WHERE `user_id` = $user_id";
        $connect = mysqli_query($con,$fetchQuery);
        if ($connect) {
          $removeQuery = "DELETE FROM cart WHERE `user_id` = $user_id";
          $proceed = mysqli_query($con,$removeQuery);
        }
        $insertQuery = "INSERT INTO cart(user_id, nameOnCert, landType, landArea, certType, personalMsg, TXN_AMOUNT) values($user_id, '$certName', '$landType', '$landArea', '$certType', '$msg', $TXN_AMOUNT)";
        $connect = mysqli_query($con, $insertQuery);

        echo "console.log('success');";
      }
      catch (\Exception $e) {
        echo "console.log(".$e.");";
      }

    }
    if (isset($_POST['placeOrderInput'])) {
      $name = $_POST['nameInput'];
      $email = $_POST['emailInput'];
      $number = $_POST['numberInput'];
      $street = $_POST['addressInput'];
      $state = $_POST['stateInput'];
      $city = $_POST['cityInput'];
      $zip = $_POST['zipInput'];
      $address = $street . " " . $city . " " . $state . " " . $zip;
      $ORDER_ID = "ORD".mt_rand(10000,99999999);
      $INDUSTRY_TYPE_ID = 'Retail';
      $CHANNEL_ID = 'WEB';
      try {
        $query = "SELECT * FROM cart WHERE user_id = '$user_id'";
        $retval = mysqli_query($con, $query);
        if($row = mysqli_fetch_assoc($retval)){
          $nameCert = $row['nameOnCert'];
          $landType = $row['landType'];
          $landArea = $row['landArea'];
          $certType = $row['certType'];
          $msg = $row['personalMsg'];
          $TXN_AMOUNT = $row['TXN_AMOUNT'];
          $sql = "INSERT INTO `orders` (`ORDER_ID`,`user_id`,`name`,`email`,`number`,`certName`,`landType`,`landArea`,`certType`,`msg`,`TXN_AMOUNT`,`address`) VALUES('$ORDER_ID','$user_id','$name','$email','$number','$nameCert','$landType','$landArea','$certType','$msg',$TXN_AMOUNT,'$address')";
          $process = mysqli_query($con,$sql);
          if ($process) {
            header('Location: payment/transaction.php?ord='.$ORDER_ID.'&cust='.$user_id.'&txn='.$TXN_AMOUNT.'&ch='.$CHANNEL_ID.'&iti='.$INDUSTRY_TYPE_ID);
          }
          else {
            echo "Error: Server isn't responding. Please try again later.";
          }
        }
      }
      catch (\Exception $e) {
        echo $e;
      }
    }
  }
?>
