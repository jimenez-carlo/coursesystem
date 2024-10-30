<?php
include("../../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = mysqli_real_escape_string($conn, $_POST['subject_name']);
    $subject_title = mysqli_real_escape_string($conn, $_POST['subject_title']);
    $subject_unit = mysqli_real_escape_string($conn, $_POST['subject_unit']);
    $subject_prerequisite = mysqli_real_escape_string($conn, $_POST['subject_prerequisite']);

    // Check if the subject name already exists
    $sql_check = "SELECT * FROM subject_tbl WHERE subject_name = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "s", $subject_name);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Subject already exists, return an error
        echo "<script>alert('This course has already exists.'); window.location.href = 'course.php';</script>";
    } else {
        // Use prepared statements to prevent SQL injection
        $sql_insert = "INSERT INTO subject_tbl (subject_name, subject_title, subject_unit, subject_prerequisite) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql_insert);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssss", $subject_name, $subject_title, $subject_unit, $subject_prerequisite);

        // Execute the statement
        $insert_query = mysqli_stmt_execute($stmt);

        // Check for errors
        if (!$insert_query) {
            die('Query Error: ' . mysqli_stmt_error($stmt));
        }

        header("Location: course.php");
        exit();
    }
}
?>