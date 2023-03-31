<?php

session_start();
session_unset();
session_destroy();


  
  // Check if the user wants to log out
  if(isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();
    
    // Redirect to the home page
    header('Location: index.php');
    exit;
  }
header ("location: index.php");

?>