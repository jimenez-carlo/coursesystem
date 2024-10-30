<?php
include("../../conn.php");

if (isset($_POST['departmentName'])) {
    $departmentName = $_POST['departmentName'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM department_tbl WHERE department_name = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter with the search query
    mysqli_stmt_bind_param($stmt, "s", $departmentName);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a result
    if ($row = mysqli_fetch_assoc($result)) {
        // Display the department details
        echo "<p>Department Name: {$row['department_name']}</p>";
        echo "<p>Department Number: {$row['department_number']}</p>";
        echo "<p>Department Status: {$row['department_status']}</p>";
    } else {
        echo "Department details not found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
