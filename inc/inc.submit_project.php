<?php
session_start();

// initializing variables
$student_email = $_SESSION['email'];
$pname = "";
$note = "";
$set_id="";
$errors = array(); 

// REGISTER USER
if (isset($_POST['submit'])) {

    // receive all input values from the form
  $pname = mysqli_real_escape_string($db, $_POST['project']);
  $note = mysqli_real_escape_string($db, $_POST['submittion_note']);
  $set_id = mysqli_real_escape_string($db, $_POST['project_id']);

    $file = $_FILES['submit_file'];
    $fileName = $_FILES['submit_file']['name'];
    $fileTmpName = $_FILES['submit_file']['tmp_name'];
    $fileSize = $_FILES['submit_file']['size'];
    $fileError = $_FILES['submit_file']['error'];
    $fileType = $_FILES['submit_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('rar','zip');

    if(in_array($fileActualExt, $allowed)){
        if($fileError == 0){
            if($fileSize < 5000000000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDes = 'submittion/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDes);
                // Finally, register user if there are no errors in the form
                if (count($errors) == 0) {
                    $query = "INSERT INTO submittion (student_email, project_name, project_note, file_des, project_status, points, mentor_note, mentor_id) 
                            VALUES('$student_email', '$pname', '$note', '$fileDes', 'Processing', '0', ' ', '$set_id')";
                    if(mysqli_query($db, $query)){header('location: ./student_submittion.php?project='.$pname); }
                    else{header('location: ./submit_project.php'); }
                }                 
            } else {
                array_push($errors, "File is too big");
            }
        } else {
            array_push($errors, "Error uploading file");
        }
    }else{
        array_push($errors, "Only upload ZIP & RAR");
    }
}

?>