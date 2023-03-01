<?php 
	if (!isset($_COOKIE['bgcolor'])) { 
		setcookie("bgcolor", "white", time() + 30);
	}

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$bgcolor = $_POST['bgcolor'];
		setcookie("bgcolor", $bgcolor, time() + 30);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
</head>
<body style="background-color: <?php echo $_COOKIE['bgcolor']; ?>;">
    <div>
		<?php include '../lab-4/View//Header.php';?>				
	</div>

	<h1>Colour Change</h1>
	<!--Cookie Work -->

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="color" name="bgcolor">
		<input type="submit" name="Change Color">
	</form>

	<div class="container">
		<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>" novalidate>

			
			<p style="font-size: 30px;" align='center'><b>Welcome to Our Website!!! </b></p>
			<!-- <div style="height: 100px;" align="center">
				<p style="font-size: 30px;"><b>Welcome to  Dream House!!! </b></p>
			</div>  -->

			<!-- <p align="center">
				<img src="House_logo.png" width="250px" >
			</p> -->

			<h1><a href="/lab-4/View/logout.php">Logout</a></h1>

			<div align="center">
				<?php include '../lab-4/View/Footer.php';?>
			</div>			
			
		</form>
	</div>

</body>
</html>