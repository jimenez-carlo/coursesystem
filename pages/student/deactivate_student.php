<?php
include("../../conn.php");

    $user_id = $_GET['id'];

    $sql_update = "UPDATE student_tbl SET student_status = 'Deactivated' WHERE student_id = '$student_id'";
    $update_query = mysqli_query($conn, $sql_update);

    header("Location: user.php");
    exit();

?>