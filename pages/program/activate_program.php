<?php
include("../../conn.php");

    $program_id = $_GET['id'];

    $sql_update = "UPDATE program_tbl SET program_status = 'Active' WHERE program_id = '$program_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: program.php");
    exit();

?>