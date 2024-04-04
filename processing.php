<?php
session_start();
include("imports/dbcon.inc");
  if (isset($_POST["type"])) {
    $type_selected = $_POST["type"];
    $area_selected = $_POST["area"];
    try {
      $sql = "SELECT * FROM products WHERE p_name='$type_selected'";
      $retval = mysqli_query($con,$sql);
      if ($row=mysqli_fetch_assoc($retval)) {
        if ($area_selected=="1 acre") {
          echo $row['p_price1'];
        }
        elseif ($area_selected=="3 acre") {
          echo $row['p_price3'];
        }
        else{
          echo $row['p_price5'];
        }
      }
    }
    catch (\Exception $e) {
      echo $e;
    }
  }

  if ($_POST["code"]!="") {
    $code = $_POST["code"];
    try {
      $sql = "SELECT * FROM discount WHERE dis_code='$code'";
      $retval = mysqli_query($con,$sql);
      $amount = 0;
      if ($row=mysqli_fetch_assoc($retval)) {
        $amount = $row['dis_amt'];
        echo $amount;
      }
      else{
        echo $amount;
      }

    } catch (\Exception $e) {
      echo $e;
    }
  }

  if (isset($_POST['query'])) {
    $keyword = $_POST['query'];
    $section = $_POST['section'];
    try {
      if ($section=='orderslist') {
        $sql = "SELECT * FROM orders WHERE `ORDER_ID` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' AND status = 0";
        $connect = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($connect);
        if ($rowcount>0) {
          $order_id = array();
          $custName = array();
          $custEmail = array();
          $custPhone = array();
          $landType = array();
          $landArea = array();
          $message = array();
          $nameOnCert = array();
          $certType = array();
          $amount = array();
          $shippingAddress = array();
          $i=1;
          while ($i<=$rowcount) {
            if ($row=mysqli_fetch_assoc($connect)) {
              $orderid[$i] = $row['ORDER_ID'];
              $custName[$i] = $row['name'];
              $custEmail[$i] = $row['email'];
              $custPhone[$i] = $row['number'];
              $landType[$i] = $row['landType'];
              $landArea[$i] = $row['landArea'];
              $message[$i] = $row['msg'];
              $nameOnCert[$i] = $row['certName'];
              $certType[$i] = $row['certType'];
              $amount[$i] = $row['TXN_AMOUNT'];
              $shippingAddress[$i] = $row['address'];
              $order = $orderid[$i];
              echo '<tr>';
              echo '<th scope="row">'.$i.'</th>';
              echo '<td>'.$orderid[$i].'</td>';
              echo '<td>'.$custName[$i].'</td>';
              echo '<td>'.$custEmail[$i].'</td>';
              echo '<td>'.$custPhone[$i].'</td>';
              echo '<td>'.$landType[$i].'</td>';
              echo '<td>'.$landArea[$i].'</td>';
              echo '<td>'.$message[$i].'</td>';
              echo '<td>'.$nameOnCert[$i].'</td>';
              echo '<td>'.$certType[$i].'</td>';
              echo '<td>'.$amount[$i].'</td>';
              echo '<td>'.$shippingAddress[$i].'</td>';
              echo '<td><button type="button" class="btn btn-outline-secondary btn-sm" onclick="markShipped(\''.$order.'\')">Shipped?</button></td>';
              echo '</tr>';
              $i = $i+1;
            }
          }
        }
        else{
          echo 'No results found';
        }
      }
      else if ($section=='transactions') {
        $sql = "SELECT * FROM transactions WHERE `order_id` LIKE '%$keyword%' OR `txn_status` LIKE '%$keyword%'";
        $connect = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($connect);
        if ($rowcount>0) {
          $order_id = array();
          $txn_id = array();
          $txn_amt = array();
          $pay_mode = array();
          $txn_date = array();
          $txn_status = array();
          $gateway = array();
          $bank_txn= array();
          $i=1;
          while ($i<=$rowcount) {
            if ($row=mysqli_fetch_assoc($connect)) {
              $order_id[$i] = $row['order_id'];
              $txn_id[$i] = $row['txn_id'];
              $txn_amt[$i] = $row['txn_amt'];
              $pay_mode[$i] = $row['pay_mode'];
              $txn_date[$i] = $row['txn_date'];
              $txn_status[$i] = $row['txn_status'];
              $gateway[$i] = $row['gateway'];
              $bank_txn[$i] = $row['bank_txn'];
              echo '<tr>';
              echo '<th scope="row">'.$i.'</th>';
              echo '<td>'.$order_id[$i].'</td>';
              echo '<td>'.$txn_id[$i].'</td>';
              echo '<td>'.$txn_amt[$i].'</td>';
              echo '<td>'.$pay_mode[$i].'</td>';
              echo '<td>'.$txn_date[$i].'</td>';
              echo '<td>'.$txn_status[$i].'</td>';
              echo '<td>'.$gateway[$i].'</td>';
              echo '<td>'.$bank_txn[$i].'</td>';
              echo '</tr>';
              $i = $i+1;
            }
          }
        }
        else{
          echo 'No results found';
        }
      }
      else if ($section=='shipped') {
        $sql = "SELECT * FROM orders WHERE `ORDER_ID` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' AND `status` LIKE '%1'";
        $connect = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($connect);
        if ($rowcount>0) {
          $orderid = array();
          $custName = array();
          $custEmail = array();
          $landType = array();
          $landArea = array();
          $nameOnCert= array();
          $certType = array();
          $amount = array();
          $shippingAddress = array();
          $tempStatus = array();
          $status = array();
          $i=1;
          while ($i<=$rowcount) {
            if ($row=mysqli_fetch_assoc($connect)) {
              $orderid[$i] = $row['ORDER_ID'];
              $custName[$i] = $row['name'];
              $custEmail[$i] = $row['email'];
              $landType[$i] = $row['landType'];
              $landArea[$i] = $row['landArea'];
              $nameOnCert[$i] = $row['certName'];
              $certType[$i] = $row['certType'];
              $amount[$i] = $row['TXN_AMOUNT'];
              $shippingAddress[$i] = $row['address'];
              $tempStatus[$i] = $row['status'];
              if ($tempStatus[$i]==0) {
                $status[$i] = 'In Transit';
              }
              elseif ($tempStatus[$i]==1) {
                $status[$i] = 'Shipped';
              }
              elseif($tempStatus[$i]==11) {
                $status[$i] = 'Delivered';
              }
              else {
                $status[$i] = 'Error';
              }
              echo '<tr>';
              echo '<th scope="row">'.$i.'</th>';
              echo '<td>'.$orderid[$i].'</td>';
              echo '<td>'.$custName[$i].'</td>';
              echo '<td>'.$custEmail[$i].'</td>';
              echo '<td>'.$landType[$i].'</td>';
              echo '<td>'.$landArea[$i].'</td>';
              echo '<td>'.$nameOnCert[$i].'</td>';
              echo '<td>'.$certType[$i].'</td>';
              echo '<td>'.$amount[$i].'</td>';
              echo '<td>'.$shippingAddress[$i].'</td>';
              echo '<td>'.$status[$i].'</td>';
              echo '</tr>';
              $i = $i+1;
            }
          }
        }
        else{
          echo 'No results found';
        }
      }
      else if ($section=='users') {
        $sql = "SELECT * FROM user WHERE `user_fname` LIKE '%$keyword%' OR `user_email` LIKE '%$keyword%'";
        $connect = mysqli_query($con, $sql);
        $rowcount = mysqli_num_rows($connect);
        if ($rowcount>0) {
          $uName = array();
          $uEmail = array();
          $uAddress = array();
          $uAdmin = array();
          $temp = array();
          $i=1;
          while ($i<=$rowcount) {
            if ($row=mysqli_fetch_assoc($retrieve)) {
              $uName[$i] = $row['user_fname'] ." ". $row['user_lname'];
              $uEmail[$i] = $row['user_email'];
              $uPhone[$i] = $row['user_phone'];
              $uAddress[$i] = $row['user_city'] ." ". $row['user_state'] ." ". $row['user_zip'];
              $temp[$i] = $row['priviledge'];
              if ($temp[$i]==0) {
                $uAdmin[$i] = 'No';
              }
              else {
                $uAdmin[$i] = 'Yes';
              }
              echo '<tr>';
              echo '<th scope="row">'.$i.'</th>';
              echo '<td>'.$uName[$i].'</td>';
              echo '<td>'.$uEmail[$i].'</td>';
              echo '<td>'.$uPhone[$i].'</td>';
              echo '<td>'.$uAddress[$i].'</td>';
              echo '<td>'.$uAdmin[$i].'</td>';
              echo '</tr>';
              $i = $i+1;
            }
          }
        }
        else{
          echo 'No results found';
        }
      }
      else{
        echo "No result found :(";
      }
    }
    catch (\Exception $e) {
      echo $e;
    }
  }
?>
