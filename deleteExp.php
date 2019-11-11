<?php
//delete user selected experiment from the experiment table on confirmation of delete
require("sqlconnection.php");
error_reporting(0);
session_start();
if(!isset($_SESSION['email']))//using this to secure any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
         $id=$_GET['experimentID'];
		 
		 $sql="DELETE FROM `experiment1` WHERE `experimentID`='$id'";
         $res= mysqli_query($con, $sql);
		 if (mysqli_fetch_array($res)){
      $message = "This task is deleted from the task list";
      echo "<script type='text/javascript'>alert('$message');</script>";
		 }
		  echo("<script>location.href = 'dashboard.php';</script>");
	  
 ?>