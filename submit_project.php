<?php include 'inc/server.php';?>
<?php include 'inc/inc.submit_project.php';?>
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
<div class="row">
  <?php
$project_name = $_GET['project'];
$project_set = "";
$set = $_SESSION['email'];
$sql = "SELECT * FROM register WHERE email='$set' and project='$project_name'";
$result = $db->query($sql);
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $project_name = $row['project'];
    }
}
$sql0 = "SELECT * FROM project WHERE Project_name='$project_name' ";
$result0 = $db->query($sql0);
if ($result0->num_rows > 0) {
    // output data of each row
    while ($row0 = $result0->fetch_assoc()) {
      $project_set = $row0['Setter']; ?>
    <div class="col s12">
      <div class="card">
        <div class="card-image">
          <img src="http://co-station.com/wp-content/uploads/2017/05/hackathon-graphic.png">
        </div>

        <div class="card-content">
        <center><span class="card-title activator grey-text text-darken-4"><b><?php echo $row0["Project_name"]; ?></b><span class="grey-text text-darken-4"><h6>by
        <?php
$set_email = $row0["Setter"];
        $sql1 = "SELECT fname, lname FROM users WHERE email='$set_email'";
        $result1 = $db->query($sql1);
        if ($result1->num_rows > 0) {
            // output data of each row
            while ($row1 = $result1->fetch_assoc()) {
                echo $row1["fname"];
                echo " ";
                echo $row1["lname"];
            }}
        ?>
        </h6>
        </span></span></center>
        <div class="section"></div>
        <p class="text-medium"><?php echo $row0["Project_statement"]; ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo $row0["Project_references"]; ?>" target="_blank">References</a>
          <a href="<?php echo $row0["Project_tools"]; ?>" target="_blank" class="right">Tools</a>
        </div>
      </div>
      </div>
      <?php }}?>
    </div>
</div>

<div class="section"></div>
<div class="container">
<div class="row">
    <div class="col s12">
      <div class="card-panel">
      <?php include('inc/errors.php'); ?>
        <form method="post" action="submit_project.php" enctype="multipart/form-data">

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='submittion_note' id='submittion_note' />
                <label for='submittion_note'>Submittion Note</label>
              </div>
            </div>

            <input type="hidden" name="project" value="<?php echo $project_name; ?>">
            <input type="hidden" name="project_id" value="<?php echo $project_set; ?>">
            
            <div class='row'>
              <div class='input-field col s12'>
                <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file" name="submit_file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
                </div>
                </div>
            </div>
            
            <center>
              <div class='row'>
                <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Submit</button>
              </div>
            </center>

        </form>
      </div>
    </div>
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