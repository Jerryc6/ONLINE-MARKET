<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Order Success</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:50px;">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-success">
					<div class="panel-heading">Order Confirmation</div>
					<div class="panel-body">
						<h2>Thank you <?php echo $_SESSION["name"]; ?>!</h2>
						<p>Your order has been successfully placed.</p>
						<a href="store.php" class="btn btn-primary">Continue Shopping</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
