<?php
include("../../conn.php");

$sem_id = $_GET['id'];

// Activate semester
$sql_update = "UPDATE semester_tbl SET sem_status = 'Active' WHERE sem_id = '$sem_id'";
$update_query = mysqli_query($conn, $sql_update);

    header("Location: semester.php");

?>