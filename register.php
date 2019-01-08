<?php
	require 'dbconfig/config.php';
$usernameerr = $passworderr = '';
if(isset($_POST['submit_btn'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	$check_username = "select * from user where username = '$username'";
	$query = mysqli_query($con, $check_username);
	$count = mysqli_fetch_array($query);
	if($count >1){
		$usernameerr = "Username is already taken";
	}else{
		$username = $_POST['username'];
	}
	
	if($password != $cpassword){
		$passworderr = 'Password not match';
	}else{
		$password = $_POST['cpassword'];
	}
	
	if(empty($usernameerr) && empty($passworderr)){
		$insert_account = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`) VALUES (NULL, '$username', ('$password'))");
		if($insert_account){
			echo "<script>alert('Added');</script>";
		}
	}
	
}
?>

<!DOCTYPE.html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="style.css">
<?php include('style.php')?>
</head>
<body>

			<div id="main-wrapper">
				<center>
					<h2>Registration Form</h2>
					<img src="icon1.png"	class="avatar"/>
				</center>
			
			
			<form classs="myform" action="" method="post">
				<label><b>Username</b></label><br>
				<input type="text" class="inputvalues"name="username" placeholder="Type your username" required/><br>
				<?php echo $usernameerr; ?><br>
				<label><b>Password</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Your Password" required/><br>
				<label><b>Confirm password</b></label><br>
				<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required/><br>
				<?php echo $passworderr; ?>
				<input name="submit_btn" input class="btn" type="submit" id="signup_btn" value="Sign Up"/><br>
				<a href="index.php"><input type="button" input class="btn" id="back_btn" value="back"/></a>
			</form>
			</div>
</body>
</html>
