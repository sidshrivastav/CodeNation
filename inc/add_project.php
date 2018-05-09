<?php
session_start();

// initializing variables
$setter_email = $_SESSION['email'];
$pname = "";
$pstatement = "";
$preference = "";
$ptools = "";
$status = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['complete'])) {
  // receive all input values from the form
  $pname = mysqli_real_escape_string($db, $_POST['pname']);
  $pstatement = mysqli_real_escape_string($db, $_POST['pstatement']);
  $preference = mysqli_real_escape_string($db, $_POST['preference']);
  $ptools = mysqli_real_escape_string($db, $_POST['ptools']);
  $status = 'Running';
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array 
  if (empty($pname)) { array_push($errors, "Name are required"); }
  if (empty($pstatement)) { array_push($errors, "Statement are required"); }
  if (empty($preference)) { array_push($errors, "References are required"); }
  if (empty($ptools)) { array_push($errors, "Tools are required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO project (Setter, Project_name, Project_statement, Project_references, Project_tools, Project_status) 
  			  VALUES('$setter_email', '$pname', '$pstatement', '$preference', '$ptools', '$status')";
      if(mysqli_query($db, $query)){header('location: ./mentor_dashboard.php'); }
      else{header('location: add_project.php'); }
        
  }
}

?>