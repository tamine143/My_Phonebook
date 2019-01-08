<?php

  
  require 'dbconfig/config.php';

  $contact_id = $_GET['delete_id'];
  $delete= "Delete from information where id = ".$contact_id;
  if (mysqli_query($con, $delete)) {
    header('location: list.php');
  }else {
    echo "Error: " . $insert_information . "<br>" . mysqli_error($con);
  }


?>