<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $program_id = isset($_POST['program_id']) ? mysqli_real_escape_string($conn, $_POST['program_id']) : '';
    $dept_program = isset($_POST['dept_program']) ? mysqli_real_escape_string($conn, $_POST['dept_program']) : '';
    $program_status = isset($_POST['program_status']) ? mysqli_real_escape_string($conn, $_POST['program_status']) : '';

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE program_tbl SET dept_program = ?, program_status = ? WHERE program_id = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    if (!$stmt) {
        die('SQL Error: ' . mysqli_error($conn));
    }

    // Bind parameters to the prepared statement (2 strings and 1 integer)
    mysqli_stmt_bind_param($stmt, "ssi", $dept_program, $program_status, $program_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect after successful update
    header("Location: program.php");
    exit();
}
?>
