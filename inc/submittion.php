<?php
session_start();

// initializing variables
$status = "";
$point = "";
$note = "";
$s_id = "";
$errors = array(); 

// REGISTER USER
if (isset($_POST['submit_reject']) or isset($_POST['submit_accept'])) {
  // receive all input values from the form
  if (isset($_POST['submit_reject'])) { $status = 'reject'; }
  if (isset($_POST['submit_accept'])) { $status = 'accept'; }
  $point = mysqli_real_escape_string($db, $_POST['point']);
  $note = mysqli_real_escape_string($db, $_POST['note']);
  $s_id = mysqli_real_escape_string($db, $_POST['id']);

  echo $status;
  echo $point;

// Finally, register user if there are no errors in the form	
$query = "UPDATE submittion SET project_status='$status', points='$point', mentor_note='$note' WHERE id='$s_id'";
      if(mysqli_query($db, $query)){header('location: ./mentor_submittion.php'); 
    }
                    else{header('location: ./mentor_dashboard.php'); 
                    }
                }


?>