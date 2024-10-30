<?php
session_start();
include("conn.php");



if (isset($_POST['login'])) {


    $user_email = $_POST['username'];
    $user_password = $_POST['password'];


    $sql = "SELECT * FROM user_tbl WHERE user_email = '$username' AND user_password = '$password' ";
    $user = $conn->query($sql) or die($conn->error);
    $row = $user->fetch_assoc();
    $valid = $user->num_rows;


    if ($username != $valid and $password != $valid) {
        $_SESSION['error'] = "** Incorrect Username or Password **";
    }


    if ($valid > 0) {
        $_SESSION['user_login'] = $row['user_id'];

        echo $_SESSION['user_login'];
        unset($_SESSION['error']);
        header("Location: final_index.php");
    }
}
?>