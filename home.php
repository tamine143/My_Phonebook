<?php
  session_start();
  $contact_id = $_SESSION['id'] ;
  $username = $_SESSION['username'];
  
  require 'dbconfig/config.php';
  if(isset($_POST['login'])){
    $username = $_POST['username'];
  }

	if(isset($_POST['save'])){
		$First_Name = $_POST['First_Name'];
		$Last_Name = $_POST['Last_Name'];
		$Contact_Number = $_POST['Contact_Number'];
		$Address = $_POST['Address'];
    $insert_information = "INSERT INTO `information` (`id`, `First_Name`, `Last_Name`, `Contact_Number`, `Address`, `user_id`) VALUES (NULL, '$First_Name', '$Last_Name', $Contact_Number, '$Address', $contact_id)";
    
    if (mysqli_query($con, $insert_information)) {
      echo"
        <script>
          var msg=confirm('New Record Inserted!!!');
          if(msg == true || msg==false){
            location.href='home.php';
          }
        </script>
      ";
    } else {
        echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
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
                <img src="img/icon1.png"  class="avatarhome"/>
      </center>

      <h3>Information Form</h3>
      <form class="needs-validation" action="" method='post'>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">First name</label>
      <input name="First_Name" type="text" class="form-control" id="validationCustom01" placeholder="First name"  autofocus required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name</label>
      <input name="Last_Name" type="text" class="form-control"  id="validationCustom02" placeholder="Last name" value="" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Contact Number</label>
      <div class="input-group">
       
        <input name="Contact_Number" type="Number" class="form-control" id="validationCustomUsername" placeholder="Contact Number" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
          Please provide a number.
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Address</label>
      <input name="Address" type="text" class="form-control" id="validationCustom03" placeholder="Address" required>
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
				            <input class="btn" type="submit" name ="save" id="save_btn" value="Save"/>
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