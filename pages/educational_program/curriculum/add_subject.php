<?php
include("../../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year_id = mysqli_real_escape_string($conn, $_POST['year_id']);
    $semester_id = mysqli_real_escape_string($conn, $_POST['semester_id']);
    $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
    $curriculum_id = mysqli_real_escape_string($conn, $_POST['curriculum_id']);


    // Check if the department_course already exists
    $check_sql = "SELECT * FROM curriculum_details_tbl WHERE code_id = ? AND year_id = ? AND semester_id = ? AND curriculum_id = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "ssss", $subject_id, $year_id, $semester_id, $curriculum_id);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // If it exists, show SweetAlert and redirect
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Subject Already exists.');
                window.location.href = 'curriculum_subjects.php?id=" . $curriculum_id . "';
              </script>";
        exit();
    }


    // Use prepared statements to prevent SQL injection
    $sql_insert = "INSERT INTO curriculum_details_tbl (code_id, year_id, semester_id, `curriculum_id`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $subject_id, $year_id, $semester_id, $curriculum_id);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: curriculum_subjects.php?id=" . $curriculum_id . "");
    exit();
}
