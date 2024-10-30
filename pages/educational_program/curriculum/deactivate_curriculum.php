<?php
include("../../conn.php");

$curriculum_id = $_GET['id'];

$sql_update = "UPDATE department_tbl SET department_status = 'Deactivated' WHERE curriculum_id = '$curriculum_id'";
$update_query = mysqli_query($conn, $sql_update);

header("Location: department.php");
exit();
