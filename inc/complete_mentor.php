<?php
session_start();

// initializing variables
$skills = "";
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname'];
$email = $_SESSION['email'];
$errors = array(); 

// REGISTER USER
if (isset($_POST['complete_user'])) {
  // receive all input values from the form
  $skills = mysqli_real_escape_string($db, $_POST['skills']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array 
  if (empty($skills)) { array_push($errors, "Skills are required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO mentor (fname, lname, email,  skill) 
  			  VALUES('$fname', '$lname', '$email', '$skills')";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "You are now logged in";
        header('location: ./mentor_dashboard.php'); 
  }
}

?>