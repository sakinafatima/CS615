 <?php 
require("sqlconnection.php");
session_start();
 if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
$email=$_SESSION['email'];
//fetching name of the sihned in user that will be used to fetch the assigned experiment from the experiment table
$q1= "select name from `users` where email='$email'";
$q2=mysqli_query($con,$q1);
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>User Dashboard</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,70" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link type="text/css" href="./assets/css/style.css?v=1.0.0" rel="stylesheet">
  <!-- Custom Css  -->
  <style>
  .table-responsive{
    overflow-y: hidden;
  }
  </style>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Dashboard</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="editProfileUser.php" >
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

        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Experiments and Tasks</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" style="text-align: center;">Assigned Experiments</th>
                    <th scope="col"  style="text-align: center;">View Detail</th>
                  </tr>
                </thead>
                <tbody>
                <?php
				//View table for list of assigned experiments that is fetched from the database
                require("sqlconnection.php");
                $exname='';
				//use of group concat to group the tasks of experiment based on task name and assigned user
				//use of distinct to avoid duplication of data while viewing
                $q2="Select DISTINCT(name),GROUP_CONCAT(DISTINCT(Tasks)) as 'Tasks'   FROM `experiment1` where user=(select name from `users` where email='$email') group by name ";
                $result= mysqli_query($con,$q2);
                while($row = mysqli_fetch_assoc($result)) {
                    $exname .=$row["name"].' ';

                ?>
                <tr>
                    <td align="center"><?php echo $row["name"]; ?></td>
                    <td align="center"><a href="viewExp.php?name=<?php echo $row["name"];?>">View Experiment Details</a></td>

                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Core -->
  <script src="./assets/js/jquery.min.js"></script>

</body>

</html>
