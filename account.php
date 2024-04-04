<?php
  session_start();
  include("imports/dbcon.inc");
  if (!isset($_SESSION['user'])) {
    echo "<script>window.location.href = 'login';</script>";
  }
  else{
      try {
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM user WHERE user_id = '$user'";
        $retval = mysqli_query($con,$sql);
        if ($row=mysqli_fetch_assoc($retval)) {
          $priviledge = $row['priviledge'];
          $fname = $row['user_fname'];
          $lname = $row['user_lname'];
          $phone = $row['user_phone'];
          $email = $row['user_email'];
          $pass = $row['user_password'];
          $city = $row['user_city'];
          $state = $row['user_state'];
          $zip = $row['user_zip'];
        }
      }
      catch (\Exception $e) {
        echo $e;
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Account - Own Galaxy</title>

  <!-- Bootstrap core CSS -->
  <?php include("imports/bootstrap.inc"); ?>

  <!-- Custom styles for this template -->
  <link href="css/account.css" rel="stylesheet">

</head>

<body>
  <?php include("imports/nav.inc"); ?>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <div class="row">
          <div class="col-sm-10">
            Dashboard
          </div>
          <div class="col-sm-2" id="menu-toggle5"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div>
      </div>
      <div class="list-group list-group-flush">
        <?php
          if ($priviledge!=1) {
        ?>
            <a href="javascript:SwapDivsWithClick('account')" class="list-group-item list-group-item-action bg-light">Account</a>
            <a href="javascript:SwapDivsWithClick('orders')" class="list-group-item list-group-item-action bg-light">Orders</a>
        <?php
          }
          else {
        ?>
            <a href="javascript:SwapDivs('account')" class="list-group-item list-group-item-action bg-light">Account</a>
            <a href="javascript:SwapDivs('orderslist')" class="list-group-item list-group-item-action bg-light">Orders List</a>
            <a href="javascript:SwapDivs('transactions')" class="list-group-item list-group-item-action bg-light">Transactions</a>
            <a href="javascript:SwapDivs('shipped')" class="list-group-item list-group-item-action bg-light">Shipped</a>
            <a href="javascript:SwapDivs('subscribers')" class="list-group-item list-group-item-action bg-light">Subscribers</a>
            <a href="javascript:SwapDivs('users')" class="list-group-item list-group-item-action bg-light">Users</a>
        <?php
          }
        ?>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <div id="account">
        <div class="container-fluid">
          <div class="alert alert-secondary" role="alert"  id="successAlert" style="display:none"></div>
          <p class="alert alert-secondary alert-dismissible" role="alert" id="successAlert" style="display:none;"></p>
          <div class="row">
            <div class="col-sm-10">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">My account</h3>
                    </div>
                    <div class="col-4 text-right">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label for="inputFirstName" class="form-control-label">First Name</label>
                            <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" value="<?php echo $fname; ?>">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label for="inputLastName" class="form-control-label">Last Name</label>
                            <input type="text" class="form-control" id="inputLastName" name="inputLastName" value="<?php echo $lname; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label for="inputEmail" class="form-control-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $email; ?>">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label for="inputPassword" class="form-control-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" value="xIm42Bsr">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="inputPhoneNumber">Phone Number</label>
                            <input type="text" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" value="<?php echo $phone; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="inputCity">City</label>
                            <input type="text" id="inputCity" name="inputCity" class="form-control form-control-alternative" value="<?php echo $city; ?>">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group focused">
                            <label class="form-control-label" for="inputState">State</label>
                            <input type="text" id="inputState" name="inputState" class="form-control form-control-alternative" value="<?php echo $state; ?>">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="inputZip">Zip</label>
                            <input type="number" id="inputZip" name="inputZip" class="form-control form-control-alternative" value="<?php echo $zip; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4">
                    <button type="submit" class="btn btn-primary" name="inputChanges">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="orders" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Orders</h3>
                    </div>
                    <div class="col-4 text-right">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle1">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM orders WHERE user_id = '$user'";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount = mysqli_num_rows($retrieve);
                      if ($rowcount>0) {
                        $orderid = array();
                        $nameOnCert= array();
                        $landType = array();
                        $landArea = array();
                        $certType = array();
                        $amount = array();
                        $shippingAddress = array();
                        $tempStatus = array();
                        $status = array();
                        $i=1;
                      ?>
                        <caption>All orders*</caption>
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ORDER ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Land Type</th>
                            <th scope="col">Land Area</th>
                            <th scope="col">Certificate</th>
                            <th scope="col">Amount (₹)</th>
                            <th scope="col">Shipping Address</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                      <?php
                        while ($i<=$rowcount) {
                          if ($row=mysqli_fetch_assoc($retrieve)) {
                            $orderid[$i] = $row['ORDER_ID'];
                            $nameOnCert[$i] = $row['certName'];
                            $landType[$i] = $row['landType'];
                            $landArea[$i] = $row['landArea'];
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
                            echo '<td>'.$nameOnCert[$i].'</td>';
                            echo '<td>'.$landType[$i].'</td>';
                            echo '<td>'.$landArea[$i].'</td>';
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
                        echo '<caption>No orders found :(</caption>';
                      }
                    }
                    catch (\Exception $e) {
                      echo $e;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="orderslist" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Orders List</h3>
                    </div>
                    <div class="col-4 text-right top-bar">
                      <input type="text" name="search" id="searchBar" placeholder=" Search" onkeyup="showResult(this.value,'orderslist')">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle2">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM orders where status = 0 AND transaction = 1";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount=mysqli_num_rows($retrieve);
                      if ($rowcount>0) {
                        $orderid = array();
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
                      ?>
                      <caption>Unfulfilled Orders*</caption>
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ORDER ID</th>
                          <th scope="col">Customer</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Type</th>
                          <th scope="col">Area</th>
                          <th scope="col">Message</th>
                          <th scope="col">Certificate Name</th>
                          <th scope="col">Certificate</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Shipping Address</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="orderslistTable">
                      <?php
                          while ($i<=$rowcount) {
                            if ($row=mysqli_fetch_assoc($retrieve)) {
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
                          echo '<caption>No new orders :(</caption>';
                        }
                      }
                      catch (\Exception $e) {
                        echo $e;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="transactions" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Transactions</h3>
                    </div>
                    <div class="col-4 text-right top-bar">
                      <input type="text" name="search" id="searchBar" placeholder=" Search" onkeyup="showResult(this.value,'transactions')">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle7">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM transactions";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount=mysqli_num_rows($retrieve);
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
                      ?>
                      <caption>All transactions*</caption>
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ORDER ID</th>
                          <th scope="col">Transaction ID</th>
                          <th scope="col">Trasaction Amount</th>
                          <th scope="col">Payment Mode</th>
                          <th scope="col">Transaction Date</th>
                          <th scope="col">Transaction Status</th>
                          <th scope="col">Gateway</th>
                          <th scope="col">Bank Transaction</th>
                        </tr>
                      </thead>
                      <tbody id="transactionsTable">
                      <?php
                          while ($i<=$rowcount) {
                            if ($row=mysqli_fetch_assoc($retrieve)) {
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
                          echo '<caption>No new orders :(</caption>';
                        }
                      }
                      catch (\Exception $e) {
                        echo $e;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="shipped" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Shipped Items</h3>
                    </div>
                    <div class="col-4 text-right top-bar">
                      <input type="text" name="search" id="searchBar" placeholder=" Search" onkeyup="showResult(this.value,'shipped')">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle3">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM orders WHERE status = 1 OR status = 11";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount=mysqli_num_rows($retrieve);
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
                    ?>
                    <caption>Fulfilled Orders*</caption>
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ORDER ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Email</th>
                        <th scope="col">Land Type</th>
                        <th scope="col">Land Area</th>
                        <th scope="col">Certificate Name</th>
                        <th scope="col">Certificate</th>
                        <th scope="col">Amount (₹)</th>
                        <th scope="col">Shipping Address</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody id="shippedTable">
                    <?php
                        while ($i<=$rowcount) {
                          if ($row=mysqli_fetch_assoc($retrieve)) {
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
                      else {
                        echo '<caption>No shipped items to display :(</caption>';
                      }
                    }
                    catch (\Exception $e) {
                      echo $e;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="users" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Users List</h3>
                    </div>
                    <div class="col-4 text-right top-bar">
                      <input type="text" name="search" id="searchBar" placeholder=" Search" onkeyup="showResult(this.value,'users')">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle4">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM user ORDER BY priviledge DESC";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount=mysqli_num_rows($retrieve);
                      if ($rowcount>0) {
                        $uName = array();
                        $uEmail = array();
                        $uAddress = array();
                        $uAdmin = array();
                        $temp = array();
                        $i=1;
                    ?>
                        <caption>All users*</caption>
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Address</th>
                            <th scope="col">Admin</th>
                          </tr>
                        </thead>
                        <tbody id="usersTable">
                    <?php
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
                      else {
                        echo '<caption>No users found :(</caption>';
                      }
                    }
                    catch (\Exception $e) {
                      echo $e;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="subscribers" style="display:none">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-white border-0">
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h3 class="mb-0">Subscribers</h3>
                    </div>
                    <div class="col-4 text-right">
                      <button class="btn btn-outline-dark btn-sm" id="menu-toggle6">Menu</button>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light cardBody">
                <table class="table rounded table-hover">
                  <?php
                    try {
                      $getQuery = "SELECT * FROM subscribers WHERE `sub_active`=1";
                      $retrieve = mysqli_query($con,$getQuery);
                      $rowcount=mysqli_num_rows($retrieve);
                      if ($rowcount>0) {
                        $sEmail = array();
                        $i=1;
                    ?>
                        <caption>All subscribers*</caption>
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Unsubscribe</th>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                        while ($i<=$rowcount) {
                          if ($row=mysqli_fetch_assoc($retrieve)) {
                            $uEmail[$i] = $row['sub_email'];
                            echo '<tr>';
                            echo '<th scope="row">'.$i.'</th>';
                            echo '<td>'.$uEmail[$i].'</td>';
                            echo '<td><button type="button" class="btn btn-outline-secondary btn-sm" onclick="unsubscribe(\''.$uEmail[$i].'\')">Unsubscribe</button></td>';
                            echo '</tr>';
                            $i = $i+1;
                          }
                        }
                      }
                      else {
                        echo '<caption>No subscriber found :(</caption>';
                      }
                    }
                    catch (\Exception $e) {
                      echo $e;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php
    if (isset($_POST['inputChanges'])) {
      $ffname = htmlspecialchars(stripslashes(trim($_POST['inputFirstName'])));
      $llname = htmlspecialchars(stripslashes(trim($_POST['inputLastName'])));
      $pphone = htmlspecialchars(stripslashes(trim($_POST['inputPhoneNumber'])));
      $eemail = htmlspecialchars(stripslashes(trim($_POST['inputEmail'])));
      $ppass = htmlspecialchars(stripslashes(trim($_POST['inputPassword'])));
      $ccity = htmlspecialchars(stripslashes(trim($_POST['inputCity'])));
      $sstate = htmlspecialchars(stripslashes(trim($_POST['inputState'])));
      $zzip = htmlspecialchars(stripslashes(trim($_POST['inputZip'])));
      if ($ppass=='xIm42Bsr') {
        $ppass = $pass;
      }
      try {
        $query = "UPDATE user SET `user_fname` = '$ffname', `user_lname`= '$llname', `user_phone` = '$pphone', `user_email` = '$eemail', `user_password` = '$ppass', `user_city` = '$ccity', `user_state` = '$sstate', `user_zip` = '$zzip' WHERE `user_id` = '$user'";
        $process = mysqli_query($con, $query);
        if ($process) {
          echo "<script>document.getElementById('successAlert').innerHTML = 'Update Successful <button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button>';</script>";
          echo "<script>document.getElementById('successAlert').style.display = 'block';</script>";
        }
        else {
          echo mysqli_error($con);
          echo "<script>document.getElementById('successAlert').innerHTML = 'Update Failed '<button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button>';</script>";
          echo "<script>document.getElementById('successAlert').style.display = 'block';</script>";
        }
      } catch (\Exception $e) {
        echo $e;
      }
    }
    if (isset($_GET['ship'])) {
      $order_id = $_GET['ship'];
      try {
        $preSQL = "UPDATE orders SET `status` = 1 WHERE `ORDER_ID` = '$order_id'";
        $update = mysqli_query($con,$preSQL);
        echo "<script>location.href='account';</script>";
      } catch (\Exception $e) {
        echo $e;
      }
    }
    if (isset($_GET['unsubscribe'])) {
      $email = $_GET['unsubscribe'];
      try {
        $preSQL = "UPDATE subscribers SET `sub_active` = 0 WHERE `sub_email` = '$email'";
        $update = mysqli_query($con,$preSQL);
        echo "<script>location.href='account';</script>";
      } catch (\Exception $e) {
        echo $e;
      }
    }
  ?>

  <?php include("imports/footer.inc"); ?>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle1").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle2").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle3").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle4").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle5").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle6").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#menu-toggle7").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript">
    <?php
      if ($priviledge!=1) {
    ?>
        function SwapDivsWithClick(div){
          divAccount= document.getElementById('account');
          divOrdersList= document.getElementById('orders');
          if (div=='account') {
            divAccount.style.display = "block";
            divOrdersList.style.display = "none";
          }
          else if(div=='orders'){
            divAccount.style.display = "none";
            divOrdersList.style.display = "block";
          }
          else{
            divAccount.style.display = "block";
            divOrdersList.style.display = "none";
          }
        }
    <?php
      }
      else{
    ?>
      function SwapDivs(div){
        divAccount = document.getElementById('account');
        divOrdersList = document.getElementById('orderslist');
        divTransactions = document.getElementById('transactions');
        divShipped = document.getElementById('shipped');
        divUsers = document.getElementById('users');
        divSubs = document.getElementById('subscribers');
        if (div=='account') {
          divAccount.style.display = "block";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "none";
          divShipped.style.display = "none";
          divUsers.style.display = "none";
          divSubs.style.display = "none";
        }
        else if(div=='orderslist'){
          divAccount.style.display = "none";
          divOrdersList.style.display = "block";
          divTransactions.style.display = "none";
          divShipped.style.display = "none";
          divUsers.style.display = "none";
          divSubs.style.display = "none";
        }
        else if(div=='shipped'){
          divAccount.style.display = "none";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "none";
          divShipped.style.display = "block";
          divUsers.style.display = "none";
          divSubs.style.display = "none";
        }
        else if(div=='users'){
          divAccount.style.display = "none";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "none";
          divShipped.style.display = "none";
          divUsers.style.display = "block";
          divSubs.style.display = "none";
        }
        else if(div=='subscribers'){
          divAccount.style.display = "none";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "none";
          divShipped.style.display = "none";
          divUsers.style.display = "none";
          divSubs.style.display = "block";
        }
        else if(div=='transactions'){
          divAccount.style.display = "none";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "block";
          divShipped.style.display = "none";
          divUsers.style.display = "none";
          divSubs.style.display = "none";
        }
        else {
          divAccount.style.display = "block";
          divOrdersList.style.display = "none";
          divTransactions.style.display = "none";
          divShipped.style.display = "none";
          divUsers.style.display = "none";
          divSubs.style.display = "none";
        }
      }

      function markShipped(orderid){
        var answer = window.confirm("Mark "+ orderid +" shipped?");
        if (answer) {
            window.location.replace("account?ship="+orderid);
        }
      }

      function unsubscribe(email){
        var answer = window.confirm("Unsubscribe "+ email +" ?");
        if (answer) {
            window.location.replace("account?unsubscribe="+email);
        }
      }

      function showResult(query,section){
        var query = query;
        var section = section;
        if (query!="") {
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.open("POST", "processing.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xmlhttp.send("query=" + query + "&section=" + section);
          xmlhttp.onload = function() {
            if (this.readyState == 4 && this.status == 200) {
              if (this.responseText!="Okay") {
                if (section == 'orderslist') {
                  document.getElementById('orderslistTable').innerHTML = this.responseText;
                }
                else if(section == 'transactions'){
                  document.getElementById('transactionsTable').innerHTML = this.responseText;
                }
                else if (section == 'shipped') {
                  document.getElementById('shippedTable').innerHTML = this.responseText;
                }
                else if (section == 'users') {
                  document.getElementById('usersTable').innerHTML = this.responseText;
                }
                else{
                  //do nothing
                }
              }
            }
          };
        }
      }
    <?php
      }
    ?>
</script>

</body>
</html>
