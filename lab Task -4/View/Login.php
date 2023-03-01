<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign In</title>
</head>
<body>

	<style type="text/css">
		.red{
			color: red;
		}
	</style>
	
	<?php
	include "./header.php";
		session_start();

		$username = $password = "";
		$usernameErr = $passwordErr = "";
		$isValid = true;

		if (isset($_SESSION['username'])) {		
			header("location: DashboardA.php");
		}
	

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (!isset($_POST['username']) || empty($_POST['username'])) {
				$usernameErr = "User Name is required";
				$isValid = false;
			}
			else{
				$username = $_POST['username'];
			}

			if (!isset($_POST['password']) || empty($_POST['password'])) {
				$passwordErr = "Password is required";
				$isValid = false;
			}
			else{
				$password = $_POST['password'];
			}
		
			if($isValid) {
				$data = json_decode(file_get_contents('../Model/AdminF.json'), true);

				if(is_array($data)){
					$message = "User not found";

					foreach($data as $key => $value){
						if ($value['username'] == $_POST['username']) {
							if ($value['password'] == $_POST['password']) {
								$_SESSION['data'] = $value;
								$_SESSION['username'] = $username;
								header("location: DashboardA.php");
							}
							else{
								$message = "Password does not match";
							}
						}
					}
				}
				else{
					$message = "User not found";
				}
			}
		}
	?>	

        <div>
		     <?php include 'header(2).php';?>				
		</div>

	<br>

	<div align="center" style="width:400px">
		<?php
		if (isset($message)) {
		 	echo "$message";
		 } 
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<fieldset>
				<table>
					<tr>
						<td>User Name</td>
						<td>:</td>
						<td><input type="text" name="username" value="<?php echo $username;?>"><span class="red">*<?php echo $usernameErr?></span></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" value="<?php echo $password;?>"><span class="red">*<?php echo $passwordErr?></span></td>
					</tr>		
				</table>
                <input type="checkbox" name="check" value="Remember Me<?php echo $check?>">Remember Me<br>

				<hr>
				<input type="submit" name="login" value="login">
				<p><a href="forgetpassword.php">Forget Password?</a></p>
			</fieldset>
		</form>		
	</div>

	<br>


</body>
</html>