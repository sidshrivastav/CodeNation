<?php
include('inc/server.php');
?>
<?php
include('inc/reg_project.php');
?>
<html>

<head>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="css/main2.css">

</head>

<body style="background-color:">
<nav style="color: #000;background-color: white;">
    <div class="nav-wrapper" >
      <a href="#" class="brand-logo" style="margin-left:10%;">CodeNation</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right:10%;">
      <li><a href="student_dashboard.php" >Dashboard</a></li>
        <li><a href="" >Ranking</a></li>
        <li><a href="student_submittion.php" >Submittion</a></li>
        <li><a href="inc/logout.php" >Log Out</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
<div class="section"></div>
<center><i class="material-icons medium">home</i><h5 class="black-text">Your Projects</h5></center>
<div class="section"></div>
<div class="row">
  <?php
$project_name = " ";
$set          = $_SESSION['email'];
$sql          = "SELECT * FROM register WHERE email='$set'";
$result       = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $project_name = $row['project'];
        $sql0         = "SELECT * FROM project WHERE Project_name='$project_name' ";
        $result0      = $db->query($sql0);
        if ($result0->num_rows > 0) {
            // output data of each row
            while ($row0 = $result0->fetch_assoc()) {
?>
   <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="http://co-station.com/wp-content/uploads/2017/05/hackathon-graphic.png">
        </div>

        <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php
                echo $row0["Project_name"];
?><i class="material-icons right">more_vert</i></span>
        <br>
        <span class="grey-text text-darken-4"><blockquote><h6>by <?php
                $set_email = $row0["Setter"];
                $sql1      = "SELECT fname, lname FROM users WHERE email='$set_email'";
                $result1   = $db->query($sql1);
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row1 = $result1->fetch_assoc()) {
                        echo $row1["fname"];
                        echo " ";
                        echo $row1["lname"];
                    }
                }
?></h6></blockquote>
        </span>
        <form class="col s12" method="get" action="submit_project.php" style="position: relative">
            <center>
              <div class='row'>
              <input type="hidden" name="project" value="<?php
                echo $row0["Project_name"];
?>">
              <button type='submit' name='go_to_submittion' class='col s12 btn btn-small waves-effect indigo'>Submit</button>
              </div>
            </center>
          </form>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php
                echo $row0["Project_name"];
?><i class="material-icons right">close</i></span>
      <p><?php
                echo $row0["Project_statement"];
?></p>
    </div>
        <div class="card-action">
          <a href="<?php
                echo $row0["Project_references"];
?>" target="_blank">References</a>
          <a href="<?php
                echo $row0["Project_tools"];
?>" target="_blank" class="right">Tools</a>
        </div>
      </div>
      </div>
      <?php
            }
        }
        
        
    }
}
?>
   </div>
</div>

<div class="container">
<div class="section"></div>
<center><i class="material-icons Medium">explore</i><h5 class="black-text">Explore Projects</h5></center>
<div class="section"></div>
<div class="row">
  <?php
$set    = $_SESSION['email'];
$sql    = "SELECT * FROM project";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
?>
   <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="http://co-station.com/wp-content/uploads/2017/05/hackathon-graphic.png">
        </div>

        <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php
        echo $row["Project_name"];
?><i class="material-icons right">more_vert</i></span>
        <br>
        <span class="grey-text text-darken-4"><blockquote><h6>by <?php
        $set_email = $row["Setter"];
        $sql1      = "SELECT fname, lname FROM users WHERE email='$set_email'";
        $result1   = $db->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while ($row1 = $result1->fetch_assoc()) {
                echo $row1["fname"];
                echo " ";
                echo $row1["lname"];
            }
        }
?></h6></blockquote>
        </span>
        <form class="col s12" method="post" action="student_dashboard.php" style="position: relative">
            <center>
              <input type="hidden" name="project" value="<?php
        echo $row["Project_name"];
?>">
        <?php
        $check = 0;
        $pn      = $row["Project_name"];
        $sql3    = " SELECT project FROM register WHERE email='$set' and project='$pn' ";
        $result3 = $db->query($sql3);
        if ($result3->num_rows > 0) {
            // output data of each row
            while ($row3 = $result3->fetch_assoc()) {
              if ($row3['project'] === $row['Project_name']) {
                $check = 1;
              }
            }
          }
             
            if ($check == 1) {
                
?>
               <button type='submit' name='' class='col s12 btn btn-small waves-effect indigo disabled'>Register</button>
              
            <?php
                } else {
?>
               <button type='submit' name='reg_project' class='col s12 btn btn-small waves-effect indigo'>Register</button>

          <?php
                }
?>

            </center>
          </form>

        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php
        echo $row["Project_name"];
?><i class="material-icons right">close</i></span>
      <p><?php
        echo $row["Project_statement"];
?></p>
    </div>
        <div class="card-action">
          <a href="<?php
        echo $row["Project_references"];
?>" target="_blank">References</a>
          <a href="<?php
        echo $row["Project_tools"];
?>" target="_blank" class="right">Tools</a>
        </div>
      </div>
      </div>
      <?php
        
    }
}
?>
   </div>
</div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
            document.addEventListener('DOMContentLoaded', function() {
   var elems = document.querySelectorAll('select');
   var options = document.querySelectorAll('option');
   var instances = M.FormSelect.init(elems, options);})
            </script>
</body>

</html>