<?php
include("../../../conn.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); // Use your actual DB connection parameters

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected values from the form
    $grades_id = $_POST['grades_id'];
    $student_id = $_POST['student_id']; // You need to ensure these are available from your form
    $currdetails_id = $_POST['currdetails_id']; // Ensure this value is being set correctly
    $grade = $_POST['grade']; // Assuming this is coming from your select
    $semesters = $_POST['semesters']; // Ensure this value is being set correctly
    $school_year = $_POST['school_year']; // Ensure this value is being set correctly
    $confirmations = $_POST['confirmations']; // Ensure this value is being set correctly

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO grades_tbl (grades_id, student_id, currdetails_id, grade, semesters, school_year, confirmations) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $grades_id, $student_id, $currdetails_id, $grade, $semesters, $school_year, $confirmations); // Bind the parameters

    // Execute the query
    if ($stmt->execute()) {
        echo "Grade saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
