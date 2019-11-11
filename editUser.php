<?php
require("sqlconnection.php");
session_start();
 if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
error_reporting(0);
$email=$_SESSION['email'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Update Users</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,70" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link type="text/css" href="./assets/css/style.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

      <!-- Brand -->
      <a class="navbar-brand pt-0" href="dashboard.php">
        <img src="./assets/img/brand/blue.png" style="max-height: 100px;" class="navbar-brand-img" alt="...">
      </a>

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="dashboard.php">
              <i class="ni ni-tv-2 text-orange"></i> Dashboard
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="addUsers.php" >
              <i class="fas fa-users text-yellow"></i> Add Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addExp.php">
              <i class="fas fa-flask text-green"></i> Add Experiments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addTask.php">
              <i class="fas fa-tasks text-blue"></i> Add Tasks
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt text-red"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Update User</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="editProfile.php">
              <div class="media align-items-center">

                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php
                  $email=$_SESSION['email'];echo $email;
                  ?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <h1 style="color:#fff;text-align:center;">Update User Details Below</h1>

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h3>Fill up User Credentials</h3>
              </div>
              <!-- Form -->
              <form role="form" name="form1" method="post"  action="editUser.php" autocomplete="on">
                <input type="text" name="id" width="900" value="<?php echo $id=$_GET['userID']; ?>" hidden >
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter User's Full-Name" name="name" type="text" value="<?php $sel_query="Select * from users where userID='$id'";
                 //data from database is fetched so that user do not have to edit all fields but only edit those which required
				$result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["name"];}?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Enter User's Email" type="email"  value= "<?php $sel_query="Select * from users where userID='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["email"];}?>" autocomplete="off" required>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" name="password" class="form-control" placeholder="Enter Password for User" type="text" onKeyUp="checkPasswordStrength();" autocomplete="off" value="<?php $sel_query="Select * from users where userID='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["password"];}?>" required>
                  </div>
                </div>
                <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small id="passwordString"></small><small><span id="passwordStrength"></span></small></div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="passwordMatch" class="form-control" name="cpassword" placeholder="Confirm Password" type="text" autocomplete="off" onKeyUp="checkPasswordMatch();" value="<?php $sel_query="Select * from users where userID='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["password"];}?>" required>
                  </div
                </div>
                <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small><span id="passwordMatchTooltip"></span></small></div>
                <div class="form-group" style="margin-top: 1.5rem;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control" placeholder="Select User's Date of Birth" name="dob" type="date" value="<?php $sel_query="Select * from users where userID='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                echo $row["dob"];}?>"autocomplete="off" required>
                  </div>
                </div>
                <div class="text-muted">
                  <h3>Select Gender</h3>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <label class="radio" style="  margin: 4%;">
                    <input type="radio" name="gender" value="male" required>
                    Male
                  </label>
                  <label class="radio" style="  margin: 4%;">
                    <input type="radio" name="gender" value="female" required>
                    Female
                  </label>
                  <label class="radio" style="margin: 4%;">
                    <input type="radio" name="gender" value="other" required>
                    Others
                  </label>
                </div>
                <div class="text-center">
                  <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add" value="Add">Add User</button>
                </div>
              </form>
              <!-- Form End -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Core -->
  <script src="./assets/js/jquery.min.js"></script>

  <script>
  // Check Password Strength
    function checkPasswordStrength() {
      var number = /([0-9])/;
      var alphabets = /([a-zA-Z])/;
      var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
      // weak Password Check
      if ($('#password').val().length < 6) {
        $('#passwordString').text("Password Strength: ");
        $('#passwordStrength').addClass('text-danger font-weight-700');
        $('#passwordStrength').text("Weak Password (Put atleast 6 words)");
      } else {
        // Strong Password Check
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
          $('#passwordStrength').removeClass();
          $('#passwordString').text("Password Strength: ");
          $('#passwordStrength').addClass('text-success font-weight-700');
          $('#passwordStrength').text("Strong Password");
        } else {
          // Moderate Password Check
          $('#passwordStrength').removeClass();
          $('#passwordString').text("Password Strength: ");
          $('#passwordStrength').addClass('text-warning font-weight-700');
          $('#passwordStrength').text("Moderate Password (Should have alphabets,numbers and special characters)");
        }
      }
    }
  </script>
  <script>
  // Password Match Function
    function checkPasswordMatch() {
      if ($('#password').val().length < 1 || $('#password').val() == "") {
        $('#passwordMatchTooltip').removeClass();
        $('#passwordMatchTooltip').text("");
        $('#submitBtn').attr('disabled', true);
      } else {
        if ($('#password').val() != $('#passwordMatch').val()) {
          $('#passwordMatchTooltip').addClass('text-danger font-weight-700');
          $('#passwordMatchTooltip').text("Password doesn't match");
          $('#submitBtn').attr('disabled', true);
        } else {
          $('#passwordMatchTooltip').removeClass();
          $('#passwordMatchTooltip').addClass('text-success font-weight-700');
          $('#passwordMatchTooltip').text("Password matched");
          $('#submitBtn').attr('disabled', false);
        }
      }
    }
  </script>
</body>

</html>

<?php

if(isset($_POST['add'])){
$name=$_POST['name'];
$id=$_POST['id'];
$pass=$_POST['password'];
$dob=$_POST['dob'];
$q1= "select * from users where email='$email'";
$res = mysqli_query($con, $q1);
if(mysqli_num_rows($res)>0)
{
	  $message = "This email address already exists, Please try again";

      echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{//updating the user's detail in database using mysql update command
$query = "UPDATE `users` SET `name`='$name',`password`='$pass',`dob`='$dob' WHERE `userID`='$id'";

$res = mysqli_query($con, $query);



    $message = "User details updated";
      echo "<script type='text/javascript'>alert('$message');</script>";
 echo("<script>location.href = 'dashboard.php';</script>");

}
}

?>
