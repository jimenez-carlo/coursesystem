<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $sem_id = isset($_POST['sem_id']) ? mysqli_real_escape_string($conn, $_POST['sem_id']) : '';
    $semester = isset($_POST['semester']) ? mysqli_real_escape_string($conn, $_POST['semester']) : '';
    $sem_status = isset($_POST['sem_status']) ? mysqli_real_escape_string($conn, $_POST['sem_status']) : '';

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE semester_tbl SET semester = ?, sem_status = ? WHERE sem_id = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssi", $semester, $sem_status, $sem_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect after successful update
    header("Location: semester.php");
    exit();
}
?>
