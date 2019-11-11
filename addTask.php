<?php
require("sqlconnection.php");
session_start();
if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
$email=$_SESSION['email'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>Add Tasks</title>
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
          <li class="nav-item ">
            <a class="nav-link" href="dashboard.php">
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
          <li class="nav-item active">
            <a class="nav-link" href="addTask.php" style="color: black;">
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Add Tasks</a>
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
          <h1 style="color:#fff;text-align:center;">Add Tasks Below</h1>

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
                <h3>Fill up Task Details</h3>
              </div>
              <form name="form1" method="post" action="addTask.php" autocomplete="on">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-tasks"></i></span>
                    </div>
                    <input class="form-control" placeholder="Enter Task Name" name="name" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <textarea name="des" rows="4" class="form-control form-control-alternative" placeholder="Enter Task Description here"></textarea>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <input class="form-control" type="url" name="url" id="url" width="900" placeholder="https://example.com" pattern="https://.*" size="100" required>
                  </div>
                </div>

                <div class="text-center">
                  <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add" value="Add">Add Task</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Core -->
  <script src="./assets/js/jquery.min.js"></script>

 <?php
 //taking task details on the submit button click
if(isset($_POST['add'])){
$name=$_POST['name'];
$link=$_POST['url'];
$des=$_POST['des'];
$q1= "SELECT * FROM `tasks` WHERE `taskName`='$name'";
$res = mysqli_query($con, $q1);
//validating that no similar task name exists in the database
if(mysqli_num_rows($res)>0)
{
$message = "This task name already exists, Please try again with a new task name";

      echo "<script type='text/javascript'>alert('$message');</script>";
}
else
{//saving task in the tasks table in database
$query = "INSERT INTO `tasks`(`taskName`, `url`, `description`) VALUES ('$name', '$link','$des')";

$res = mysqli_query($con, $query);

    $message = $name." is added to the task list";
    echo "<script type='text/javascript'>alert('$message');</script>";
	echo("<script>location.href = 'dashboard.php';</script>");

}
}
?>
