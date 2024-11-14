<?php
include("../../conn.php");

    $admin_id = $_GET['id'];

    $sql_update = "UPDATE admin_tbl SET admin_status = 'Active' WHERE admin_id = '$admin_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: admin.php");
    exit();

?>