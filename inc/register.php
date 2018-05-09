<?php
session_start();

// initializing variables
$fname = "";
$lname = "";
$email = "";
$type = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { array_push($errors, "First Name is required"); }
  if (empty($lname)) { array_push($errors, "Last Name is required"); }  
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $email_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fname, lname, email, type, password) 
  			  VALUES('$fname', '$lname', '$email', '$type', '$password')";
  	mysqli_query($db, $query);
      $_SESSION['email'] = $email;
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
    $_SESSION['success'] = "You are now logged in";
    if($type==="reg_mentor"){
        header('location: ./mentor_complete.php');
    }  
    if($type==="reg_student"){
        header('location: ./student_complete.php');
    } 
  }
}

?>