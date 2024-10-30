<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $year_id = isset($_POST['year_id']) ? mysqli_real_escape_string($conn, $_POST['year_id']) : '';
    $year_year = isset($_POST['year_year']) ? mysqli_real_escape_string($conn, $_POST['year_year']) : '';
    $yearlevel_status = isset($_POST['yearlevel_status']) ? mysqli_real_escape_string($conn, $_POST['yearlevel_status']) : '';

    // Prepare SQL query
    $sql_update = "UPDATE year_levels_tbl SET year_year = ?, yearlevel_status = ? WHERE year_id = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssi", $year_year, $yearlevel_status, $year_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect to the yearlevel.php page
    header("Location: yearlevel.php");
    exit();
}
?>
