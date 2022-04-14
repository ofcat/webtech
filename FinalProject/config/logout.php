<?php
require 'db.php';
require '../sites/includes/user_access.php';
     session_start();
     //Change access
     logout($_SESSION['username'], $con);
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: ../sites/index.php");
    }
?>