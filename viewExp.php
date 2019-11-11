<?php
require("sqlconnection.php");
session_start();
 if(!isset($_SESSION['email']))//using this to secure from any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
$x=$_GET['name'];
$email=$_SESSION['email'];
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>View Experiment</title>
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
            <a class="nav-link" href="logout.php">
              <i class="fas fa-sign-out-alt text-red"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboardUser.php">View Experiment</a>
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
          <h1 style="color:#fff;text-align:center;"> Perform Experiment: <?php echo "'".$x."' ";?> with given tasks in the same order as given</h1>
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
				    <th scope="col" style="text-align: left;">Task Order</th>
                    <th scope="col" style="text-align: left;">Task Name</th>
					 <th scope="col" style="text-align: center;">Description</th>
                    <th scope="col" style="text-align: left;">Url</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
				  //this shows the details of the experiment (tasks and their order) that is assigned to the user
                require("sqlconnection.php");
                $taskname='';
				//using user email address and experiment name in query to fetch the tasks of the experiment
                $q1="select DISTINCT(`Tasks`) as Tasks from `experiment1` where name='$x' and user=(select name from `users` where email='$email')";
                $result=mysqli_query($con,$q1);
                while($row = mysqli_fetch_assoc($result)){
                $taskname .=$row["Tasks"].',';
                }
				 $counter=1;
				 //this foreach is used to fetch each record seperately so that user can view it seperately
                foreach(explode(',',$taskname) as $t1)
                {
                $q2="Select * FROM `tasks` where taskName='$t1'";
                $result= mysqli_query($con,$q2);

                while($row = mysqli_fetch_assoc($result)) {

               ?>
                  <tr>
                    <td align="left"><?php echo  $counter; ?></td>
                    <td align="left"><?php echo $row["taskName"]; ?></td>
					<td align="center">
											<div class="dropdown">
                        <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Description
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">
		                <?php echo $row["description"]; ?>
		                 </a>

                        </div>
                      </div>
                  </td>
					<td align="left"><a href = "<?php echo $row["url"]; ?>"> Visit Link </a></td>
                  </tr>

                  <?php
                    }?>
                  <?php
				$counter++;}
                   ?>
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
  <script src="./assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
