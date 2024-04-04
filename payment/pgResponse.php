<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include_once('../imports/dbcon.inc');

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Payment Response</title>
		<?php include('../imports/bootstrap.inc'); ?>
		<link rel="stylesheet" href="../css/txn.css">
	</head>
	<body class="back">
		<?php
		$paytmChecksum = "";
		$paramList = array();
		$isValidChecksum = "FALSE";

		$paramList = $_POST;
		$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

		//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

		if($isValidChecksum == "TRUE") {
			if (isset($_POST) && count($_POST)>0 )
			{
				try {
					$STATUS = $_POST['STATUS'];
					$ORDER_ID = $_POST['ORDERID'];
					$TXN_ID = $_POST['TXNID'];
					$TXN_AMT = $_POST['TXNAMOUNT'];
					$PAY_MODE = $_POST['PAYMENTMODE'];
					$TXN_DATE = $_POST['TXNDATE'];
					$GATEWAY  = $_POST['GATEWAYNAME'];
					$BANK_TXN = $_POST['BANKTXNID'];
					$query = "INSERT INTO `transactions`(`order_id`, `txn_id`, `txn_amt`, `pay_mode`, `txn_date`, `txn_status`, `gateway`, `bank_txn`) VALUES ('$ORDER_ID','$TXN_ID',$TXN_AMT,'$PAY_MODE','$TXN_DATE','$STATUS','$GATEWAY','$BANK_TXN');";
					$retval = mysqli_query($con,$query);
					$sql = "UPDATE `orders` SET `transaction` = 1 WHERE `ORDER_ID` = '$ORDER_ID'";
					$connect = mysqli_query($con,$sql);
					if (!$connect) {
						echo "console.log(".mysqli_error($con).")";
					}
				}
				catch (\Exception $e) {
					echo $e;
				}
				// foreach($_POST as $paramName => $paramValue) {
				// 		echo "<br/>" . $paramName . " = " . $paramValue;
				// }
			}
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
		?>
		<div class="jumbotron">
			<div class="container">
				<div class="heading text-center">
					<h1>Transaction successful.</h1>
					<p>Payment was successful, here are the details:</p>
					<br>
				</div>
				<hr class="my-4">
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td><strong>TRANSACTION STATUS</strong></td>
							<td>SUCCESSFUL</td>
						</tr>
						<tr>
							<td> <strong>TRANSACTION ID</strong> </td>
							<td><?php echo $BANK_TXN; ?></td>
						</tr>
						<tr>
							<td> <strong>GATEWAY</strong> </td>
							<td><?php echo $GATEWAY; ?></td>
						</tr>
						<tr>
							<td> <strong>ORDER ID</strong> </td>
							<td><?php echo $ORDER_ID; ?></td>
						</tr>
						<tr>
							<td> <strong>TRANSACTION AMOUNT</strong> </td>
							<td><?php echo $TXN_AMT; ?></td>
						</tr>
						<tr>
							<td> <strong>PAYMENT MODE</strong> </td>
							<td><?php echo $PAY_MODE; ?></td>
						</tr>
					</tbody>
				</table>
				<hr class="my-4">
				<p class="text-center">Click <a href="../index">here</a> to go back.</p>
				<hr class="my-4">
			</div>
		</div>
		<?php
				// echo "<b>Transaction status is success</b>" . "<br/>";
				//Process your transaction here as success transaction.
				//Verify amount & order id received from Payment gateway with your application's order id and amount.
			}
			else {
		?>
		<div class="jumbotron">
			<div class="container">
				<div class="heading text-center">
					<h1>Transaction failed.</h1>
					<p>Payment unsuccessful, click <a href="../index">here</a> to go back. </p>
					<p>In case of a debit, please email us at <em><a href="mailto:customercare.owngalaxy@gmail.com">customercare.owngalaxy@gmail.com</a></em></p>
					<br>
				</div>
			</div>
		</div>
		<?php
		}

			// if (isset($_POST) && count($_POST)>0 )
			// {
			// 	try {
			// 		$STATUS = $_POST['STATUS'];
			// 		$ORDER_ID = $_POST['ORDERID'];
			// 		$TXN_ID = $_POST['TXNID'];
			// 		$TXN_AMT = $_POST['TXNAMOUNT'];
			// 		$PAY_MODE = $_POST['PAYMENTMODE'];
			// 		$TXN_DATE = $_POST['TXNDATE'];
			// 		$GATEWAY  = $_POST['GATEWAYNAME'];
			// 		$BANK_TXN = $_POST['BANKTXNID'];
			// 		$query = "INSERT INTO `transactions`(`order_id`, `txn_id`, `txn_amt`, `pay_mode`, `txn_date`, `txn_status`, `gateway`, `bank_txn`) VALUES ('$ORDER_ID','$TXN_ID',$TXN_AMT,'$PAY_MODE','$TXN_DATE','$STATUS','$GATEWAY','$BANK_TXN');";
			// 		$retval = mysqli_query($con,$query);
			// 	}
			// 	catch (\Exception $e) {
			// 		echo $e;
			// 	}
			//
			// 			// foreach($_POST as $paramName => $paramValue) {
			// 	// 		echo "<br/>" . $paramName . " = " . $paramValue;
			// 	// }
			// }
		}
		else {
			echo "<b>Something went wrong.</b>";
			//Process transaction as suspicious.
		}
		?>
	</body>
</html>
