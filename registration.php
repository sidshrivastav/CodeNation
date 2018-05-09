<?php include('inc/server.php') ?>
<?php include('inc/register.php') ?>
<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>
<img src="img/bg.jpg" id="bg" alt="">    
  <main>
    <center style="position: relative;">
    <a href="index.php"><h1 class="white-text">CodeNation</h1></a>

      <h5 class="white-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="width:377.73px;display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" method="post" action="registration.php">
          <?php include('inc/errors.php'); ?>
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='fname' id='fname' />
                <label for='fname'>First Name</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='lname' id='lname' />
                <label for='lname'>Last Name</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Email</label>
              </div>
            </div>

            <div class='row'>
              <div class="input-field col s12">
                <select name="type">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="reg_student">Student</option>
                  <option value="reg_mentor">Mentor</option>
                </select>
                <label>Account Type</label>
              </div>
            </div>
            

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Password</label>
              </div>
              
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='reg_user' class='col s12 btn btn-large waves-effect indigo'>Register</button>
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