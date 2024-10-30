<?php
// Include the database connection script
include('../../conn.php');

// Check if user_id is set and not empty
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    // Sanitize the input to prevent SQL injection
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    // Prepare the delete statement
    $sql = "DELETE FROM user_tbl WHERE user_id = $user_id";

    // Execute the delete statement
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "User ID is not provided";
}

// Close the database connection
$conn->close();

// Redirect back to the user page
header("location: /coursesystem/pages/user/user.php");
exit;
?>
