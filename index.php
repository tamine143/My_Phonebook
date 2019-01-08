<?php
		require 'dbconfig/config.php';
		session_start();
		
		$username = $password = '';
		$err = '';
		if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "select * from user where username = '$username' AND password = ('$password')";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
		echo $count ;
		if($count ==1 ) {
			$_SESSION['username'] = $row['username'];
			$_SESSION['id'] = $row['id'];
			header('location: home.php');
		}else{
			$err = 'Invalid Username/Password';
		
		if($result){
      		echo "<script>alert('unknown Username! Please Register!');</script>";
    	}
			
		}
	}
	mysqli_close($con);	
		
		
?>

<!DOCTYPE.html>
<html>
<head>
<title>Phonebook</title>
<link rel="stylesheet" href="style.css">
<?php include('style.php')?>
</head>
<body>

			<div id="main-wrapper">
				<center>
					<h2>Login Form</h2>
					<img src="img/icon1.png"	class="avatar"/>

				</center> 
			
			
			<form classs="myform" action="" method="post">
				<label><b>username</b></label><br>
				<input name="username" type="text" class="inputvalues" placeholder="Type your username" autofocus required/><br>
				<label><b>password</b></label><br>
				<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
				<input name="login"  class="btn btn-block btn-info" type="submit" id="login_btn" value="Login"/><br></a>
				<a href="register.php"><input class="btn" type="button" id="register_btn" value="Register"/><br></a>
			</form>
			
			<?php

			
			?>
			</div>
</body>
</html>
