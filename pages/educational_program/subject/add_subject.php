<?php
include("../../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $department_id = mysqli_real_escape_string($conn, $_POST['department_id']);
    $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
    $subject_title = mysqli_real_escape_string($conn, $_POST['subject_title']);
    $subject_unit = mysqli_real_escape_string($conn, $_POST['subject_unit']);
    $subject_prerequisite = mysqli_real_escape_string($conn, $_POST['subject_prerequisite']);

    // Check if the subject already exists
    $check_query = "SELECT * FROM subject_tbl WHERE subject_name = ?";
    $stmt_check = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt_check, "s", $subject_name);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);

    // If the subject exists, return an error
    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        echo '<script>alert("This course has already existed."); window.location.href="subject.php";</script>';
        exit();
    }

    // Use prepared statements to prevent SQL injection for the insert
    $sql_insert = "INSERT INTO subject_tbl (subject_name, subject_title, subject_unit, subject_prerequisite, department_id) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt_insert, "ssss", $subject_name, $subject_title, $subject_unit, $subject_prerequisite, $department_id);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt_insert);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt_insert));
    }

    // Redirect to the subject page after successful insertion
    header("Location: subject.php");
    exit();
}
