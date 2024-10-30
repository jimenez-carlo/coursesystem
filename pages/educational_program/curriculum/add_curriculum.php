<?php
include("../../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curriculum_name = mysqli_real_escape_string($conn, $_POST['curriculum_name']);
    $year_semester_id = mysqli_real_escape_string($conn, $_POST['year_semester_id']);
    $department_id = mysqli_real_escape_string($conn, $_POST['department_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);


    // Check if the department_course already exists
    $check_sql = "SELECT * FROM curriculum_tbl WHERE curriculum_name = ? AND year_semester_id = ? AND department_id = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "sss", $curriculum_name, $year_semester_id, $department_id);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // If it exists, show SweetAlert and redirect
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('The Curriculum Already exists.');
                window.location.href = 'curriculum.php';
              </script>";
        exit();
    }


    // Use prepared statements to prevent SQL injection
    $sql_insert = "INSERT INTO curriculum_tbl (curriculum_name, year_semester_id, department_id, `description`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssss", $curriculum_name, $year_semester_id, $department_id, $description);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: curriculum.php");
    exit();
}
