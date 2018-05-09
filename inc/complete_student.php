<?php
session_start();

// initializing variables
$cname = "";
$pyear = "";
$skills = "";
$lname = $_SESSION['lname'];
$fname = $_SESSION['fname'];
$email = $_SESSION['email'];
$errors = array(); 

// REGISTER USER
if (isset($_POST['complete_user'])) {
  // receive all input values from the form
  $cname = mysqli_real_escape_string($db, $_POST['college_name']);
  $pyear = mysqli_real_escape_string($db, $_POST['passing_year']);
  $skills = mysqli_real_escape_string($db, $_POST['skills']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($cname)) { array_push($errors, "College Name is required"); }
  if (empty($pyear)) { array_push($errors, "Passing Year is required"); }  
  if (empty($skills)) { array_push($errors, "Skills are required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO student (fname, lname, email, college_name, passing_year, skills) 
  			  VALUES('$fname', '$lname', '$email', '$cname', '$pyear', '$skills')";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "You are now logged in";
        header('location: ./student_dashboard.php'); 
  }
}

?>