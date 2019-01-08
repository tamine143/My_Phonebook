<?php
session_start();

$contact_id = $_SESSION['id'] ;
$username = $_SESSION['username'];


require 'dbconfig/config.php';
	if (isset($_SESSION['username']));
	$sql = "SELECT * FROM information where user_id = ".$contact_id;
	$records=mysqli_query($con,$sql);
?>
<!DOCTYPE.html>
<html>
<head>
<title>Phonebook</title>
<link rel="stylesheet" href="style.css">
<?php include('style.php')?>
</head>
<body>
<!DOCTYPE.html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
<?php include('style.php')?>
</head>
<body>
			<div id="wrapper">
				<div class="row justify-content-center">
					<div class="col-6">
						<h1>Welcome <?php echo $username; ?></h1>
            <img src="img/icon1.png"  class="avatar_list"/>
					</div>
				</div>
				
				<div class="d-flex justify-content-end mr-5">
					<a href="home.php"><h1><i class="fas fa-plus-circle    "></i></h1></a>
				
				</div>
      <center><h2>Contact List</h2>
      <table class="table table-bordered table-hover table-striped" >
      	<tr>
      		<th>id</th>
      		<th>First_Name</th>
      		<th>Last_Name</th>
      		<th>Contact_Number</th>
      		<th>Address</th>
                  <th colspan='2'>Action</th>
      	</tr>

      	<?php
      		while($information=mysqli_fetch_assoc($records)){
      			echo "<tr>";?>

						<td><?php echo $information['id'] ?></td>
						<td><?php echo $information['First_Name'] ?></td>
						<td><?php echo $information['Last_Name'] ?></td>
						<td><?php echo $information['Contact_Number'] ?></td>
						<td><?php echo $information['Address'] ?></td>
						<td>
							<a href="delete.php?delete_id=<?php echo $information['id']; ?>"><i class="fas fa-trash text-danger "></i></a>
						</td>
						<td>
							<a href="edit.php?edit_id=<?php echo $information['id']; ?>"><i class="fas fa-user-edit    "></i></a>
						</td>
					</tr>
      	<?php	}
      	?>
      </center></table>
			


			<div class="d-flex justify-content-end mr-5">
			
				
			<a href="index.php" class="btn btn-danger"> <i class="fas fa-power-off    "></i>  </a>
				</div>
				
			<!-- <form class="myform" action="home.php" method="post">
				<a href ="index.php"><input class="btn" type="button" id="logout_btn" value="Log Out"/><br></a>
			</form> -->
</body>
</html>
