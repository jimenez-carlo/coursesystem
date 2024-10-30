<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $student_firstname = isset($_POST['student_firstname']) ? mysqli_real_escape_string($conn, $_POST['student_firstname']) : '';
    $student_middlename = isset($_POST['student_middlename']) ? mysqli_real_escape_string($conn, $_POST['student_middlename']) : '';
    $student_lastname = isset($_POST['student_lastname']) ? mysqli_real_escape_string($conn, $_POST['student_lastname']) : '';
    $student_civilstatus = isset($_POST['student_civilstatus']) ? mysqli_real_escape_string($conn, $_POST['student_civilstatus']) : '';
    $student_address = isset($_POST['student_address']) ? mysqli_real_escape_string($conn, $_POST['student_address']) : '';
    $student_mobile = isset($_POST['student_mobile']) ? mysqli_real_escape_string($conn, $_POST['student_mobile']) : '';
    $student_email = isset($_POST['student_email']) ? mysqli_real_escape_string($conn, $_POST['student_email']) : '';

    // File upload handling
    $target_directory = "../../uploads/";

    // Check if the target directory exists, if not, create it
    if (!file_exists($target_directory)) {
        if (!mkdir($target_directory, 0777, true)) {
            die('Failed to create target directory. Please check file permissions.');
        }
    }

    // Check if the file field is set
    if (!empty($_FILES['student_profile']['name'])) {
        $student_profile = $_FILES['student_profile']['name'];

        // Generate a unique filename
        $target_file = $target_directory . uniqid() . '_' . basename($student_profile);

        // Check if file is an actual image
        $check = getimagesize($_FILES['student_profile']['tmp_name']);
        if (!$check) {
            die('File is not an image.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['student_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    } else {
        // If no file is uploaded, set $target_file to empty string
        $target_file = '';
    }

    // Use prepared statements to prevent SQL injection
    $sql_insert = "INSERT INTO student_tbl (student_firstname, student_middlename, student_lastname, student_address, student_mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $student_firstname, $student_middlename, $student_address, $student_mobile, $student_email,  $target_file);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect to student.php after successful insertion
    header("Location: student.php");
    exit();
}
?>
