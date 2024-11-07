<?php
include("../../conn.php");

if (isset($_POST['adminEmail'])) {
    $adminEmail = $_POST['adminEmail'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM admin_tbl WHERE admin_email = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter with the search query
    mysqli_stmt_bind_param($stmt, "s", $adminEmail);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a result
    if ($row = mysqli_fetch_assoc($result)) {
        // Display the admin details
        echo "<p>Admin Email: {$row['admin_email']}</p>";
        echo "<p>Admin Firstname: {$row['admin_firstname']}</p>";
        echo "<p>Admin Lastname: {$row['admin_lastname']}</p>";
        echo "<p>Admin Position: {$row['admin_position']}</p>";
        echo "<p>Admin Password: {$row['admin_password']}</p>";
        echo "<p>Admin Status: {$row['admin_status']}</p>";

    }else {
        echo "Department details not found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
