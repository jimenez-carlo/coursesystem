<?php
include("../../conn.php");

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM admin_tbl WHERE admin_email LIKE ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter with the search query
    $searchParam = $searchQuery . '%';
    mysqli_stmt_bind_param($stmt, "s", $searchParam);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Display the live search results as clickable suggestions
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='list-group-item suggestion'>{$row['admin_email']}</div>";
        }
    } else {
        echo "No results found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
