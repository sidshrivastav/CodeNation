<?php include('inc/server.php') ?>
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
        <li><a href="mentor_dashboard.php" >Dashboard</a></li>
        <li><a href="" >Ranking</a></li>
        <li><a href="mentor_submittion.php" >Submittion</a></li>
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
    session_start();
    $set = $_SESSION['email']; 
    $sql = "SELECT * FROM project WHERE Setter='$set'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="http://co-station.com/wp-content/uploads/2017/05/hackathon-graphic.png">
        </div>
        
        <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row["Project_name"]; ?><i class="material-icons right">more_vert</i></span>
          <p></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php echo $row["Project_name"]; ?><i class="material-icons right">close</i></span>
      <p><?php echo $row["Project_statement"]; ?></p>
    </div>
        <div class="card-action">
          <a href="<?php echo $row["Project_references"]; ?>" target="_blank">References</a>
          <a href="<?php echo $row["Project_tools"]; ?>" target="_blank" class="right">Tools</a>
        </div>
      </div>
      </div>
      <?php
      }}
    
    ?>
    </div>
</div>

<div class="container">
<div class="section"></div>
<center><i class="material-icons Medium">explore</i><h5 class="black-text">Explore Projects</h5></center>
<div class="section"></div>
<div class="row">
  <?php
    $set = $_SESSION['email']; 
    $sql = "SELECT * FROM project";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {?>
    <div class="col s4">
      <div class="card">
        <div class="card-image">
          <img src="http://co-station.com/wp-content/uploads/2017/05/hackathon-graphic.png">
        </div>
        
        <div class="card-content">
        <span class="card-title activator grey-text text-darken-4"><?php echo $row["Project_name"]; ?><i class="material-icons right">more_vert</i></span>
          <p></p>
        </div>
        <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><?php echo $row["Project_name"]; ?><i class="material-icons right">close</i></span>
      <p><?php echo $row["Project_statement"]; ?></p>
    </div>
        <div class="card-action">
          <a href="<?php echo $row["Project_references"]; ?>" target="_blank">References</a>
          <a href="<?php echo $row["Project_tools"]; ?>" target="_blank" class="right">Tools</a>
        </div>
      </div>
      </div>
      <?php
      }}
    
    ?>
    </div>
</div>


  <div class="fixed-action-btn">
  <a class="btn-floating btn-large blue accent-4">
    <i class="large material-icons">dehaze</i>
  </a>
  <ul>
    <li><a class="btn-floating blue accent-4" href="add_project.php"><i class="large material-icons">add_circle_outline</i></a></li>
  </ul>
</div>

  <!-- <center><p>Hi! <?php echo $_SESSION['fname']+' '+$_SESSION['fname']; ?></p></center> -->
 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.fixed-action-btn');
                var instances = M.FloatingActionButton.init(elems);})
            </script>
</body>

</html>
