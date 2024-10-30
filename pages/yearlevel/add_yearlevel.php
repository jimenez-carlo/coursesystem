<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $year_year = isset($_POST['year_year']) ? mysqli_real_escape_string($conn, $_POST['year_year']) : '';

    // Server-side validation
    if (empty($year_year)) {
        echo "<script>alert('Please enter a year level.'); window.location.href='yearlevel.php';</script>";
    } else {
        // Check if the year level already exists
        $sql_check = "SELECT * FROM year_levels_tbl WHERE year_year = ?";
        $stmt_check = mysqli_prepare($conn, $sql_check);
        mysqli_stmt_bind_param($stmt_check, "s", $year_year);
        mysqli_stmt_execute($stmt_check);
        $result_check = mysqli_stmt_get_result($stmt_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Year level already exists
            echo "<script>alert('The year level already exists. Please enter a different year level.'); window.location.href='yearlevel.php';</script>";
        } else {
            // Use prepared statements to prevent SQL injection
            $sql_insert = "INSERT INTO year_levels_tbl (year_year) VALUES (?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);

            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt_insert, "s", $year_year);

            // Execute the statement
            $insert_query = mysqli_stmt_execute($stmt_insert);

            // Check for errors
            if (!$insert_query) {
                die('Query Error: ' . mysqli_stmt_error($stmt_insert));
            }

            // Redirect after successful insertion
            header("Location: yearlevel.php");
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
