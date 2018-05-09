<?php include ('inc/server.php'); 
    session_start();
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
<center><h5 class="black-text">Your Submittions</h5></center>
<div class="section"></div>
<div class="row">
<table class="centered striped">
        <thead>
          <tr>
              <th>Project Name</th>
              <th>Submittion Note</th>
              <th>Status</th>
              <th>Points</th>
              <th>Mentor
          </tr>
        </thead>
        <tbody>
  <?php
$set = $_SESSION['email'];
$sql = "SELECT * FROM submittion WHERE student_email='$set'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
       ?>
       <tr>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo$row['project_note'] ?></td>
            <td><span class="red" style="padding:2%;color:white"><?php echo$row['project_status'] ?></span></td>
            <td><?php echo$row['points'] ?></span></td>
            <td><?php echo$row['mentor_note'] ?></span></td>
        </tr>
        <?php
    }
}
?> </tbody></table></div></div>


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