<?php
include("../../conn.php");

$sem_id = $_GET['id'];

// Deactivate semester
$sql_update = "UPDATE semester_tbl SET sem_status = 'Deactivated' WHERE sem_id = '$sem_id'";
$update_query = mysqli_query($conn, $sql_update);


    header("Location: semester.php");
    
?>
