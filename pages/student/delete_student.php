<?php
// Include the database connection script
include('../../conn.php');

// Check if student_id is set and not empty
if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
    // Sanitize the input to prevent SQL injection
    $student_id = mysqli_real_escape_string($conn, $_GET['student_id']);

    // Prepare the delete statement
    $sql = "DELETE FROM student_tbl WHERE student_id = $student_id";

    // Execute the delete statement
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Student ID is not provided";
}

// Close the database connection
$conn->close();

// Redirect back to the user page
header("location:/coursesystem/pages/student/student.php");
exit;
?>
