<?php
  session_start();
  require 'dbconfig/config.php';
  $contact_id = $_GET['edit_id'];

  $username = $_SESSION['username'];
  

 	if(isset($_GET['edit_id'])){
	// $id=$_GET['edit_id'];		 

	$get_contact = mysqli_query($con, "select * from information where id = '$contact_id'");

  $row = mysqli_fetch_array($get_contact);
   }

	
   if(isset($_POST['update'])){
		$First_Name = $_POST['First_Name'];
		$Last_Name = $_POST['Last_Name'];
		$Contact_Number = $_POST['Contact_Number'];
    $Address = $_POST['Address'];
    $contact_id = $_POST['contact_id'];
    
    $update = "    UPDATE `information` SET `First_Name`='$First_Name',`Last_Name`='$Last_Name',`Contact_Number`='$Contact_Number',`Address`='$Address'  WHERE id=".$contact_id;
    if (mysqli_query($con, $update)) {

      header('location: list.php');
    }else {
      echo "Error: " . $update . "<br>" . mysqli_error($con);
    }

      }
        
?>


<!DOCTYPE.html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
<?php include('style.php')?>
</head>
<body>
			<div id="wrapper">

			<center>
                <h1>Welcome <?php echo $username; ?></h1>
                <img src="icon1.png"  class="avatar"/>
      </center>

      <h3>Edit Contact</h3>
      <form action="edit.php?edit_id=<?php echo $_GET['edit_id']; ?>" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <input type="hidden"  name="contact_id" value="<?php echo $row[0]; ?>">
      <label for="validationCustom01">First name</label>
      <input name="First_Name" type="text" value="<?php  echo $row['First_Name'];  ?>" class="form-control" id="validationCustom01" placeholder="First name"  autofocus required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name</label>
      <input name="Last_Name" type="text" value="<?php  echo $row['Last_Name'];  ?>" class="form-control"  id="validationCustom02" placeholder="Last name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Contact Number</label>
      <div class="input-group">
       
        <input name="Contact_Number" type="Number" value="<?php  echo $row['Contact_Number'];  ?>" class="form-control" id="validationCustomUsername" placeholder="Contact Number" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please provide a number.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Address</label> 
      <input name="Address" type="text"   value="<?php  echo $row['Address'];  ?>" class="form-control" id="validationCustom03" placeholder="Address" required>
      <div class="invalid-feedback">
        Please provide a valid address.
      </div>
    </div>
   
      </div>
  <div class="form-group">
    <div class="form-check">

      <div class="invalid-feedback">
        You must agree before submitting.
    </div>
   </div>
  </div>
  					<form class="myform" action="home.php" method="post">
				            <input class="btn" type="submit" name ="update" id="save_btn" value="Update"/>
                    <a href ="list.php"><input class="btn" type="button" id="list_btn" value="List"/><br></a>
			     </form>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
			
			</div>	
</body>
</html>