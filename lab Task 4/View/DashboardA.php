<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<style>
      background-image: url("ukilee.png");
      background-color: #cccccc;	
	</style>
	<?php 
	session_start();

	if (isset($_SESSION['username'])) {		

	} else {
		header("location:login.php");
	}
 	?>

	<div>
		<?php include 'header(2).php';?>				
	</div>	

	<br>
	
	<div>
		<fieldset>
			<form>
			<p style="font-size: 25px;" align='center'>Welcome to Our Website <b><?php echo $_SESSION['username'];?></b></p>
				<div>
					<table>
						<tr>
							<td style="width: 70%; float: center;">
								<label><b>Account</b></label> 
								 <br>
								<ul>									
									<li><a href="dashboard.php">Dashboard</a></li>
									<li><a href="viewprofile.php">View Profile</a></li>
									<li><a href="editprofile.php">Edit Profile</a></li>
									
								</ul>
							</td>
							
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include 'Footer.php';?>
	</div>
</body>
</html>