<?php
include("../../conn.php");

if (isset($_POST['studentFirstname'])) {
    $userFirstname = $_POST['studentFirstname'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM student_tbl WHERE student_firstname= ?";

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
        echo "<p>Student Firstname: {$row['student_firstname']}</p>";
        echo "<p>Student Middlename: {$row['student_middlename']}</p>";
        echo "<p>Student Lastname: {$row['student_lastname']}</p>";
        echo "<p>Student Gender: {$row['student_gender']}</p>";
        echo "<p>Student Age: {$row['student_age']}</p>";
        echo "<p>Student Birthday: {$row['student_birthday']}</p>";
        echo "<p>Student Birthmonth: {$row['student_birthmonth']}</p>";
        echo "<p>Student Birthyear: {$row['student_birthyear']}</p>";
        echo "<p>Student Place_of_Birth: {$row['student_placeofbirth']}</p>";
        echo "<p>Student Civil_Status: {$row['student_civilstatus']}</p>";
        echo "<p>Student Address: {$row['student_address']}</p>";
        echo "<p>Student Mobile: {$row['ustudent_mobile']}</p>";
        echo "<p>Student Email: {$row['student_email']}</p>";
        echo "<p>Student Password: {$row['student_password']}</p>";
        echo "<p>Student Status: {$row['student_status']}</p>";
        echo "<p>Student Profile: {$row['student_Profile']}</p>";

    }else {
        echo "User details not found.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
