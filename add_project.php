<?php include('inc/server.php') ?>
<?php include('inc/add_project.php') ?>
<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>
  <div class="section"></div>
  <main>
    <center style="position: relative;">
      <h5 class="black-text">Add Project</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="width:377.73px;display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="add_project.php">
          <?php include('inc/errors.php'); ?>
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>
            
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='pname' id='pname' />
                <label for='pname'>Project Name</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <textarea class='validate materialize-textarea' type='text' name='pstatement' id='pdesc'></textarea>
                <label for='pstatement'>Project Statement</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <textarea class='validate materialize-textarea' type='text' name='preference' id='preference'></textarea>
                <label for='preference'>Project Reference</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <textarea class='validate materialize-textarea' type='text' name='ptools' id='ptools'></textarea>
                <label for='ptools'>Project Tools</label>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='complete' class='col s12 btn btn-large waves-effect indigo'>Add</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>
 
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