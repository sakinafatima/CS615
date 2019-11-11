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

  <title>Edit Tasks</title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Edit Tasks</a>
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
          <h1 style="color:#fff;text-align:center;">Edit Tasks Below</h1>

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
              <!-- Form -->
              <form name="form1" method="post" action="editTask.php">
                <input type="text" name="id" width="900" placeholder=" taskID" value="<?php echo $id=$_GET['taskId']; ?>" hidden>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">

                    <input class="form-control" type="text" name="name" width="900" value="<?php $sel_query="Select * from tasks where taskId='$id'";
                            //data from database is fetched so that user do not have to edit all fields but only edit those which required
						   $result = mysqli_query($con,$sel_query);
                           while($row = mysqli_fetch_assoc($result)) {
                           echo $row["taskName"];}?>" readonly>                  </div>
                </div>
                <div class="form-group">
                  <textarea name="des" rows="4" class="form-control form-control-alternative" placeholder="Update Task Description here" ><?php $sel_query="Select * from `tasks` where taskId='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { echo $row['description'];}?></textarea>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-link"></i></span>
                    </div>
                    <input class="form-control" type="url" name="url" id="url" width="900" placeholder="https://example.com" pattern="https://.*" size="100" value="<?php $sel_query="Select * from `tasks` where taskId='$id'";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { echo $row['url'];}?>" required>
                  </div>
                </div>

                <div class="text-center">
                  <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add1" value="Update">Update Task</button>
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
  <?php
  error_reporting(0);

  require("sqlconnection.php");

  if(isset($_POST['add1'])){
 
 $link=$_POST['url'];
  $des=$_POST['des'];
  $id=$_POST['id'];
  //updating task details in the database using update command
  $query = "UPDATE `tasks` SET `url`='$link',`description`='$des' WHERE `taskId`='$id'";

  $res = mysqli_query($con, $query);

      $message = "This Task has been updated";
        echo "<script type='text/javascript'>alert('$message');</script>";
       echo("<script>location.href = 'dashboard.php';</script>");

  
  }
  ?>
