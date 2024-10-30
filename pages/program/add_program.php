<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $program_id = isset($_POST['program_id']) ? mysqli_real_escape_string($conn, $_POST['program_id']) : '';
    $dept_program = isset($_POST['dept_program']) ? mysqli_real_escape_string($conn, $_POST['dept_program']) : '';
    $program_status = isset($_POST['program_status']) ? mysqli_real_escape_string($conn, $_POST['program_status']) : '';

    // Check if the department_course already exists
    $check_sql = "SELECT * FROM program_tbl WHERE dept_program = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "s", $dept_program); // Corrected variable
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // If it exists, show SweetAlert and redirect
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('The department program already exists.');
                window.location.href = 'program.php';
              </script>";
        exit();
    } 

    // Use prepared statements to prevent SQL injection for insertion
    $sql_insert = "INSERT INTO program_tbl (dept_program, program_status) VALUES (?, ?)"; // Removed program_id
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement (only 2 values now)
    mysqli_stmt_bind_param($stmt, "ss", $dept_program, $program_status);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: program.php");
    exit();
}
?>
