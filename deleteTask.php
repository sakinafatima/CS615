<?php
//delete user selected task from the tasks table on confirmation of delete
require("sqlconnection.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['email']))//using this to secure any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
         $id=$_GET['taskId'];
		 //validating that the selected task is not associated with any experiment 
		 $sel_query="SELECT Tasks FROM `experiment1` where `Tasks` like concat('%',(select taskName from `tasks` where `taskId`='$id'), '%')";
		 $res= mysqli_query($con, $sel_query);
		
		 if (mysqli_fetch_array($res)){
         
       $message = "This task is associated with some experiment, hence it can not be deleted";
       echo "<script type='text/javascript'>alert('$message');</script>";
	   echo("<script>location.href = 'dashboard.php';</script>");

		 }

		 else
		 {
			 $sql="DELETE FROM `tasks` WHERE `taskId`='$id'";
			 $res= mysqli_query($con, $sql);
			  $message = "This task is deleted";
            echo "<script type='text/javascript'>alert('$message');</script>";
	        echo("<script>location.href = 'dashboard.php';</script>");
            
		 }
		 
	  
 ?>