<?php
    session_start();
    $errors = array(); 
    if (isset($_POST['btn_login'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
      
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['email'] = $email;
              $sql = "SELECT * FROM users WHERE email='$email'";
              $result = $db->query($sql);
              if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["type"] === 'reg_mentor'){header('location: ./mentor_dashboard.php');}
              if($row["type"] === 'reg_student'){header('location: ./student_dashboard.php');}
            } }
                
              $_SESSION['success'] = "You are now logged in";
              
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
      }
?>