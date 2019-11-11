<?php
require("sqlconnection.php");
session_start();
//taking login details of user and researcher after user clicks the submit button
if(isset($_POST['submit'])){  
$email=$_POST['email'];
$pass=$_POST['password'];
//validating that user entets the correct email and password
$query = "SELECT r.*, u.* FROM `researcher` as r, users as u WHERE (r.email='$email' AND r.password='$pass') OR (u.email='$email' AND u.password='$pass')";


$res = mysqli_query($con, $query); 
if(mysqli_num_rows($res)>0)
	
         {
		     $_SESSION['email']=$email; 
			 
    header('location:dashboard.php');
   }
   else
   {//in case of wrong email or password, notifying user through a popup
    $message = "In correct password or user name";
      echo "<script type='text/javascript'>alert('$message');</script>";
	 echo("<script>location.href = 'sign-in.php';</script>");
   }
 }
    
?>
