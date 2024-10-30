<?php
include("../../conn.php");

    $department_id = $_GET['id'];

    $sql_update = "UPDATE department_tbl SET department_status = 'Active' WHERE department_id = '$department_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: department.php");
    exit();

?>