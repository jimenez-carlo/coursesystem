<?php
require_once('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $curriculum_id = $_POST["curriculum_id"];
    $department_id = $_POST["department_id"];
    $year_semester_id = $_POST["year_semester_id"];
    $curriculum_name = $_POST["curriculum_name"];
    $description = $_POST['description'];

    // Check if the department_course already exists
    $check_sql = "SELECT * FROM curriculum_tbl WHERE curriculum_name = ? AND year_semester_id = ? AND department_id = ? AND curriculum_id <> ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "ssss", $curriculum_name, $year_semester_id, $department_id, $curriculum_id);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // If it exists, show SweetAlert and redirect
    if (
        mysqli_num_rows($result) > 0
    ) {
        echo "<script>
                alert('The Curriculum Already exists.');
                window.location.href = 'curriculum.php';
              </script>";
        exit();
    }

    // Update the department details in the database
    $sql = "UPDATE curriculum_tbl SET
            curriculum_name = '$curriculum_name',
            year_semester_id = '$year_semester_id',
            department_id = '$department_id',
            `description` = '$description'
            WHERE curriculum_id = '$curriculum_id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Curriculum updated successfully."); window.location.href="curriculum.php";</script>';
    } else {
        echo '<script>alert("Error updating Curriculum."); window.location.href="curriculum.php";</script>' . $conn->error;
    }
}

$conn->close();
