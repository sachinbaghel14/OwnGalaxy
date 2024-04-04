<?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	if (isset($_GET['ord'])) {
		$ORDER_ID = htmlspecialchars(trim($_GET['ord']));
		$CUST_ID = htmlspecialchars(trim($_GET['cust']));
		$TXN_AMOUNT = htmlspecialchars(trim($_GET['txn']));
		$CHANNEL_ID = htmlspecialchars(trim($_GET['ch']));
		$INDUSTRY_TYPE_ID = htmlspecialchars(trim($_GET['iti']));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Merchant Check Out Page</title>
		<meta name="GENERATOR" content="Evrsoft First Page">
		<?php
			include('../imports/bootstrap.inc');
		?>
		<link rel="stylesheet" href="css/txn.css">
	</head>
	<body class="back">
		<main>
			<div class="jumbotron">
				<div class="container">
					<div class="heading text-center">
						<h1>Thanks for your order.</h1>
						<p>We're processing your order, here are the details.</p>
						<br>
					</div>
					<hr class="my-4">
					<form method="post" action="pgredirect.php">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td><strong>ORDER ID</strong></td>
									<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID; ?>" readonly>
								</tr>
								<tr>
									<td><strong>CUSTOMER ID</strong></td>
									<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $CUST_ID; ?>1" readonly></td>
								</tr>
								<tr>
									<td><strong>INDUSTRY TYPE</strong></td>
									<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="<?php echo $INDUSTRY_TYPE_ID; ?>" readonly></td>
								</tr>
								<tr>
									<td><strong>TRANSACTION AMOUNT</strong></td>
									<td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $TXN_AMOUNT; ?>" readonly>
								</tr>
									<td><input title="TXN_AMOUNT" type="hidden" tabindex="10" type="text" name="CHANNEL_ID" value="<?php echo $CHANNEL_ID; ?>" readonly>
								<tr>
									<td><strong>Process Payment</strong></td>
									<td><input value="Process" class="btn btn-primary btn-sm" type="submit"	onclick=""></td>
								</tr>
							</tbody>
						</table>
					</form>
					<hr class="my-4">
					<div class="text-center">
							<p>Please send us an email at <em><a href="mailto:customercare.owngalaxy@gmail.com">customercare.owngalaxy@gmail.com</a></em> with any questions regarding your purchases.</p>
						<br>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
