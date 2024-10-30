<?php
include("../../conn.php");

if (isset($_POST['userFirstname'])) {
    $userFirstname = $_POST['userFirstname'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM user_tbl WHERE user_firstname= ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter with the search query
    mysqli_stmt_bind_param($stmt, "s", $userFirstname);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is a result
    if ($row = mysqli_fetch_assoc($result)) {
        // Display the user details
        echo "<p>User Firstname: {$row['user_firstname']}</p>";
        echo "<p>User Lastname: {$row['user_lastname']}</p>";
        echo "<p>User Housenum: {$row['user_housenum']}</p>";
        echo "<p>User StreetName: {$row['user_streetname']}</p>";
        echo "<p>User Barangay: {$row['user_barangay']}</p>";
        echo "<p>User Email: {$row['user_email']}</p>";
        echo "<p>User MobileNumber: {$row['user_mobilenumber']}</p>";
        echo "<p>User Password: {$row['user_password']}</p>";
        echo "<p>User Birthday: {$row['user_birthday']}</p>";
        echo "<p>User Birthmonth: {$row['user_birthmonth']}</p>";
        echo "<p>User Birthyear: {$row['user_birthyear']}</p>";
        echo "<p>User Account_Status: {$row['user_account_status']}</p>";

    }else {
        echo "User details not found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
