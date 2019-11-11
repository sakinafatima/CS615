<?php
 require("sqlconnection.php");
session_start();
$email=$_SESSION['email'];
//securing the page so that only authorized reseracher can access the dashboard page
if($_SESSION['email'] == "sakina725@gmail.com"){
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>Dashboard</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,70" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link type="text/css" href="./assets/css/style.css?v=1.0.0" rel="stylesheet">
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
            <i class="fas fa-tv"></i> Dashboard
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="dashboard.php">Dashboard</a>
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
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tasks</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $q1="SELECT count(*) as tasks FROM `tasks`";
					  $result = mysqli_query($con,$q1);
					  while($row=mysqli_fetch_assoc($result)) {
                      echo $row['tasks'];
					  } ?>
					  </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Experiments</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $q1="SELECT COUNT(DISTINCT(name)) as exp FROM `experiment1` ";
					  $result = mysqli_query($con,$q1);
					  while($row=mysqli_fetch_assoc($result)) {
                      echo $row['exp'];
					  } ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                      <span class="h2 font-weight-bold mb-0"><?php $q1="SELECT count(*) as users FROM `users`";
					  $result = mysqli_query($con,$q1);
					  while($row=mysqli_fetch_assoc($result)) {
                      echo $row['users'];
					  } ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Users</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>

                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Assigned Experiments</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				//View table for list of existing users that is fetched from the database
                require("sqlconnection.php");
                $sel_query="Select * from users where 1";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) {
                $expname=$row["name"];
                $q2="SELECT DISTINCT(name) FROM `experiment1` WHERE user='$expname'";
                $result1 = mysqli_query($con,$q2);
                	?>
                  <tr>

                    <td align="left" style='text-transform: capitalize;'><?php echo $row["name"]; ?></td>
                    <td align="left"><?php echo $row["email"]; ?></td>
                    <td align="left" style='text-transform: capitalize;'><?php echo $row["gender"]; ?></td>
                    <td align="left"><?php echo $row["dob"]; ?></td>
                    <td align="left">

                      <a style="color:#deae3d;" href="editUser.php?userID=<?php echo $row["userID"]; ?>"><span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#deae3d !important;"></i> Edit
                      </span></a>
                    </td>
                    <td align="left">
                      <a style="color:#b14141;" onclick='javascript:confirmationDelete($(this));return false;' href="deleteUser.php?userID=<?php echo $row["userID"]; ?>"> 	<span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#b14141 !important;"></i> Delete
                      </span></a>
                    </td>
                    <td align="center">
											<div class="dropdown">
                        <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#">  <?php
		                foreach( $result1 as $row ){
		                    echo "<option style='font-size: .875rem;  padding: .5rem 1rem;text-transform: capitalize;'>" . $row['name'] . "</option>";
		                   }

		                 ?></a>

                        </div>
                      </div>
                  </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Experiments</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>

                    <th scope="col">Experiment Name</th>
                    <th scope="col" >Experiment Subject</th>
                    <th scope="col" style="text-align:center;">Assigned Tasks</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  //View table for list of existing experiments that is fetched from the database
                require("sqlconnection.php");
                $sel_query="SELECT  experimentID, name, subject, Tasks as 'Tasks' FROM `experiment1` group by experimentID";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>

                    <td align="left" style='text-transform: capitalize;'><?php echo $row["name"]; ?></td>
                    <td align="left" style='text-transform: capitalize;'><?php echo $row["subject"]; ?></td>
					<td align="center">
											<div class="dropdown">
                        <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Task
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#"><?php echo $row["Tasks"]; ?></a>

                        </div>
                      </div>
                  </td>
                    <td align="left">
                      <a style="color:#deae3d;" href="editExperiment.php?experimentID=<?php echo $row["experimentID"]; ?>"><span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#deae3d !important;"></i> Edit
                      </span></a>
                    </td>
                    <td align="left">
                      <a style="color:#b14141;" onclick='javascript:confirmationDelete($(this));return false;' href="deleteExp.php?experimentID=<?php echo $row["experimentID"]; ?>">	<span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#b14141 !important;"></i> Delete
                      </span></a>
                    </td>

                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Tasks</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" style="table-layout:fixed;">
                <thead class="thead-light">
                  <tr>

                    <th scope="col">Task Name</th>
                    <th scope="col" style="text-align:center;">Description</th>
                    <th scope="col">URL</th>
                    <th scope="col" style="text-align:left;">Edit</th>
                    <th scope="col" style="text-align:left;">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				  //View table for list of existing tasks that is fetched from the database
                require("sqlconnection.php");

                $sel_query="Select * from `tasks` where 1";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>

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
                    <td align="left">
                      <a style="color:#deae3d" href="editTask.php?taskId=<?php echo $row["taskId"]; ?>"><span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#deae3d !important;"></i> Edit
                      </span></a>
                    </td>
                    <td align="left">
                      <a style="color:#b14141" onclick='javascript:confirmationDelete($(this));return false;' href="deleteTask.php?taskId=<?php echo $row["taskId"];?>"><span class="badge badge-dot mr-4">
												<i class="bg-danger" style=" margin-bottom: 3px; width: 10px; height: 10px;	background-color:#b14141 !important;"></i> Delete
                      </span></a>
                    </td>
                  </tr>
                  <script type='text/javascript'>
                    function confirmationDelete(anchor) {
                      var conf = confirm('Are you sure want to delete this record?');
                      if (conf) {
                        window.location = anchor.attr("href");
                      }
                    }
                  </script>
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
  <script src="./assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
}
else
{
header('location:dashboardUser.php');
}
 ?>
