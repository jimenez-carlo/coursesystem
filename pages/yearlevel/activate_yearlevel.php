<?php
include("../../conn.php");

    $year_id = $_GET['id'];

    $sql_update = "UPDATE year_levels_tbl SET yearlevel_status = 'Active' WHERE year_id = '$year_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: yearlevel.php");
    exit();

?>