<?php
include("../../conn.php");

    $user_id = $_GET['id'];

    $sql_update = "UPDATE user_tbl SET user_account_status = 'Active' WHERE user_id = '$user_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: user.php");
    exit();

?>