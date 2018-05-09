<?php
session_start();

// initializing variables
$user = $_SESSION['email'];
$project = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_project'])) {
  // receive all input values from the form
  $project = mysqli_real_escape_string($db, $_POST['project']);

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO register (email, project, pstatus) 
  			  VALUES('$user', '$project', 'Processing')";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "You are now logged in";
        header('location: ./student_dashboard.php'); 
  }
}

?>