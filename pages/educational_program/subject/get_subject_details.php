<?php
include("../../conn.php");

if (isset($_POST['courseName'])) {
    $courseNameName = $_POST['courseName'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM course_tbl WHERE course_name = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter with the search query
    mysqli_stmt_bind_param($stmt, "s", $courseName);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a result
    if ($row = mysqli_fetch_assoc($result)) {
        // Display the course details
        echo "<p>Subject Name: {$row['subject_name']}</p>";
        echo "<p>Subject Title: {$row['subject_title']}</p>";
        echo "<p>Subject Unit: {$row['subject_unit']}</p>";
        echo "<p>Subject Pre-Requisite: {$row['subject_prerequisite']}</p>";
    } else {
        echo "Coursecklist details not found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
