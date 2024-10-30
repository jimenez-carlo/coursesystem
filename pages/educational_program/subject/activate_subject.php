<?php
include("../../../conn.php");

    $code_id = $_GET['id'];

    $sql_update = "UPDATE subject_tbl SET course_status = 'Active' WHERE code_id = '$code_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: subject.php");
    exit();

?>