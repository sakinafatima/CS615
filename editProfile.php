<?php
 require("sqlconnection.php");
//edit profile page for researcher
session_start();
if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
$name="";
$email=$_SESSION['email'];
if($_SESSION['email'] == "sakina725@gmail.com"){
$q1="SELECT `name` FROM `researcher` as name where `email`='$email'";
 $result = mysqli_query($con,$q1);
 while($row=mysqli_fetch_assoc($result)) {
  $name= $row['name'];
 }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>Profile</title>
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
      <!-- User -->

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
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php" style="color: black;">
              <i class="ni ni-tv-2 text-orange"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addUsers.php">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Profile Page</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          <!-- Card stats -->
          <div class="container-fluid d-flex align-items-center">
            <div class="row">
              <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello <?php echo $name; ?></h1>
                <p class="text-white mt-0 mb-5">Below you can make changes to your account password </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="./assets/img/theme/team-4-800x800.svg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <span class="font-weight-light"></span><?php echo $name;?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $email;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>

              </div>
            </div>
            <div class="card-body">
              <!-- Form -->
              <form name="form1" method="post"  action="editProfile.php">
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                <div class="pl-lg-8" align="center">
                  <div class="form-group" style="margin-bottom: 1.75rem;">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                      </div>
                      <input name="opassword" class="form-control" placeholder="Enter Current Password" type="password" required>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 0px;">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input id="password" name="password" class="form-control" placeholder="Enter New Password" type="password" onKeyUp="checkPasswordStrength();" required>
                    </div>
                  </div>
                  <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small id="passwordString"></small><small><span id="passwordStrength"></span></small></div>
                  <div class="form-group" style="margin-bottom: 0px;">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input id="passwordMatch" class="form-control" name="cpassword" placeholder="Confirm New Password" type="password" onKeyUp="checkPasswordMatch();" required>
                    </div>
                  </div>
                  <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small><span id="passwordMatchTooltip"></span></small></div>

                  <div class="text-center">
                    <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add" value="Update">Change Password</button>
                  </div>
                </div>
              </form>
              <!-- Form End -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>

    <script>
    // password Strength check
      function checkPasswordStrength() {
        // variable declaration
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        // Weak Password check
        if ($('#password').val().length < 6) {
          $('#passwordString').text("Password Strength: ");
          $('#passwordStrength').addClass('text-danger font-weight-700');
          $('#passwordStrength').text("Weak Password (Atleast 6 words needed)");
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
    // Password Match Check
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
require("sqlconnection.php");
//edit profile page for password
$email=$_SESSION['email'];


if(isset($_POST['add'])){
$passO=$_POST['opassword'];
$passC=$_POST['cpassword'];
$passN=$_POST['password'];
$q1= "select * from researcher where `email`='$email' and `password`='$passO'";
$res = mysqli_query($con, $q1);
if(mysqli_num_rows($res)>0)
{
	if($passC==$passN)
	{//updating researcher's profile password with mySQL update command
	$query = "UPDATE `researcher` SET `password`='$passN' WHERE `email`='$email'";

    $res = mysqli_query($con, $query);
	 $message = "password updated";
      echo "<script type='text/javascript'>alert('$message');</script>";
	  echo("<script>location.href = 'dashboard.php';</script>");
	}
	else{
		$message = "password mismatch, please try again";
      echo "<script type='text/javascript'>alert('$message');</script>";
	}


}
else
{

$message = "wrong current password, please try again";
      echo "<script type='text/javascript'>alert('$message');</script>";
}
}
}
?>
