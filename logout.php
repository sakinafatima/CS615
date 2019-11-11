<?php
// remove all session variables on logout
session_unset();

// destroy the session
session_destroy();
header('location:sign-in.php');
?>