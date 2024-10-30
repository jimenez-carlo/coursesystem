<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $department_course = isset($_POST['department_course']) ? mysqli_real_escape_string($conn, $_POST['department_course']) : '';
    $department_status = isset($_POST['department_status']) ? mysqli_real_escape_string($conn, $_POST['department_status']) : 'Active';

    // Check if the department_course already exists
    $check_sql = "SELECT * FROM department_tbl WHERE department_course = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $department_course);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // If it exists, show SweetAlert and redirect
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('The department course already exists.');
                window.location.href = 'Department.php';
              </script>";
        exit();
    }

    // Use prepared statements to prevent SQL injection for insertion
    $sql_insert = "INSERT INTO department_tbl (department_course, department_status) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $department_course, $department_status);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: Department.php");
    exit();
}
