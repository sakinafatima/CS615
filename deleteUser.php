<?php
//delete selected user from the users table on confirmation of delete
require("sqlconnection.php");
session_start();
error_reporting(0);
if(!isset($_SESSION['email']))//using this to secure any unauthoized access to this page
{
    // not logged in
    header('Location: sign-in.php');
    
}
         $id=$_GET['userID'];
		 
		 //validating that the selected task is not associated with any experiment 
		 $sel_query="SELECT `user` FROM `experiment1` where `user`=(select name from `users` where `userID`='$id')";
		 $res= mysqli_query($con, $sel_query);
		
		 if (mysqli_fetch_array($res)){
      
     $message = "user associated with some experiment, cannot delete ";
            echo "<script type='text/javascript'>alert('$message');</script>";
	        echo("<script>location.href = 'dashboard.php';</script>");
		
		 }
		 else
		 {
			$sql="DELETE FROM `users` WHERE `userID`='$id'";
            $res= mysqli_query($con, $sql);
			$message = "user deleted";
            echo "<script type='text/javascript'>alert('$message');</script>";
	        echo("<script>location.href = 'dashboard.php';</script>");
			
		 }
		 
	  
 ?>