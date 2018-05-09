<?php include ('inc/server.php'); ?>
<?php     include ('inc/submittion.php'); ?> 

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
<center><h5 class="black-text">Submittions</h5></center>
<div class="section"></div>
<div class="row">
<table class="centered striped">
        <thead>
          <tr>
              <th>Project Name</th>
              <th>Submittion Note</th>
              <th>Project</th>
              <th>Points</th>
              <th>Mentor Note </th>
          </tr>
        </thead>
        <tbody>
  <?php
$set = $_SESSION['email'];
$sql = "SELECT * FROM submittion WHERE mentor_id='$set' and project_status='Processing'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
       ?>
       <tr>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo$row['project_note']; ?></td>
            <td>
                <a href="<?php echo $row['file_des']; ?>" download>Download</a>
            </td>
            <form method="post" action="mentor_submittion.php">
                <input type='hidden' name='id' value="<?php echo $row['id']; ?>" >
                <td><div class='input-field col s12'>
                    <input type='text' name='point' id='point' />
                    <label for='point'>Point out of 10</label>
                    </div></td>
                <td><div class='input-field col s12'>
                <input type='text' name='note' id='pname' />
                <label for='pname'>Mentor Note</label>
              </div></td>
              <td>
              <button type='submit' name='submit_reject' class='col s6 btn btn-small waves-effect indigo'><i class="material-icons">close</i></button>
              <button type='submit' name='submit_accept' class='col s6 btn btn-small waves-effect indigo'><i class="material-icons">done</i></button></td>
            </form>
        </tr>
        <?php
    }
}
?> </tbody></table></div></div>

<div class="container">
<div class="section"></div>
<center><h5 class="black-text">Accepted Submittion</h5></center>
<div class="section"></div>
<div class="row">
<table class="centered striped">
        <thead>
          <tr>
              <th>Project Name</th>
              <th>Submittion Note</th>
              <th>Status</th>
              <th>Points</th>
              <th>Mentor Note</th>
          </tr>
        </thead>
        <tbody>
  <?php
$sql1 = "SELECT * FROM submittion WHERE mentor_id='$set' and project_status='accept'";
$result1 = $db->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while ($row1 = $result1->fetch_assoc()) {
       ?>
       <tr>
            <td><?php echo $row1['project_name']; ?></td>
            <td><?php echo$row1['project_note'] ?></td>
            <td><span class="blue" style="padding:2%;color:white">Accepted</span></td>
            <td><?php echo$row1['points'] ?></span></td>
            <td><?php echo$row1['mentor_note'] ?></span></td>
        </tr>
        <?php
    }
}
?> </tbody></table></div></div>


<div class="container">
<div class="section"></div>
<center><h5 class="black-text">Rejected Submittion</h5></center>
<div class="section"></div>
<div class="row">
<table class="centered striped">
        <thead>
          <tr>
              <th>Project Name</th>
              <th>Submittion Note</th>
              <th>Status</th>
              <th>Points</th>
              <th>Mentor Note</th>
          </tr>
        </thead>
        <tbody>
  <?php
$sql1 = "SELECT * FROM submittion WHERE mentor_id='$set' and project_status='reject'";
$result1 = $db->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while ($row1 = $result1->fetch_assoc()) {
       ?>
       <tr>
            <td><?php echo $row1['project_name']; ?></td>
            <td><?php echo$row1['project_note'] ?></td>
            <td><span class="red" style="padding:2%;color:white">Rejected</span></td>
            <td><?php echo$row1['points'] ?></span></td>
            <td><?php echo$row1['mentor_note'] ?></span></td>
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