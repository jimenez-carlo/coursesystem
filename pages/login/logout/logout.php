<?php
session_start(); // Start the session

// Check if the admin is already logged in
if(isset($_SESSION['admin'])) {
    // Destroy all session data
    session_destroy();
    
    // Redirect to the login page or any other page you want
    header("Location: ../../login.php");
    exit();
} else {
    // If the admin is not logged in, redirect to the login page
    header("Location: ../../login.php");
    exit();
}
?>