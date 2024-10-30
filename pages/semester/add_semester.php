<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $semester = isset($_POST['semester']) ? mysqli_real_escape_string($conn, $_POST['semester']) : '';

    // Server-side validation
    if (empty($semester)) {
        echo "<script>alert('Please enter a semester.'); window.location.href='semester.php';</script>";
    } else {
        // Check if the semester already exists
        $sql_check = "SELECT * FROM semester_tbl WHERE semester = ?";
        $stmt_check = mysqli_prepare($conn, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "s", $semester);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Semester already exists
            echo "<script>alert('The semester already exists. Please enter a different semester.'); window.location.href='semester.php';</script>";
        } else {
            // Use prepared statements to prevent SQL injection
            $sql_insert = "INSERT INTO semester_tbl (semester) VALUES (?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);

            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt_insert, "s", $semester);

            // Execute the statement
            $insert_query = mysqli_stmt_execute($stmt_insert);

            // Check for errors
            if (!$insert_query) {
                die('Query Error: ' . mysqli_stmt_error($stmt_insert));
            }

            // Redirect after successful insertion
            header("Location: semester.php");
            exit();
        }

        // Free result set
        mysqli_free_result($result_check);
        mysqli_stmt_close($stmt_check);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
