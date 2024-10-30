<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $department_course = isset($_POST['department_course']) ? mysqli_real_escape_string($conn, $_POST['department_course']) : '';
    $first_name = isset($_POST['first_name']) ? mysqli_real_escape_string($conn, $_POST['first_name']) : '';
    $middle_name = isset($_POST['middle_name']) ? mysqli_real_escape_string($conn, $_POST['middle_name']) : '';
    $last_name = isset($_POST['last_name']) ? mysqli_real_escape_string($conn, $_POST['last_name']) : '';
    $department_mobile = isset($_POST['department_mobile']) ? mysqli_real_escape_string($conn, $_POST['department_mobile']) : '';
    $department_id = isset($_POST['department_id']) ? mysqli_real_escape_string($conn, $_POST['department_id']) : '';

    // Add department_status (you may need to retrieve this from $_POST or another source)
    $department_status = isset($_POST['department_status']) ? mysqli_real_escape_string($conn, $_POST['department_status']) : '';

    // Continue with your code logic here

    // File upload handling
    $target_directory = "uploads/";

    // Check if the file field is set
    if (!empty($_FILES['department_profile']['name'])) {
        $department_profile = $_FILES['department_profile']['name'];

        // Generate a unique filename
        $target_file = $target_directory . uniqid() . '_' . basename($department_profile);

        // Check if file is an actual image
        $check = getimagesize($_FILES['department_profile']['tmp_name']);
        if (!$check) {
            die('File is not an image.');
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            die('File already exists.');
        }

        // Check file size (you can adjust this value)
        if ($_FILES['department_profile']['size'] > 1000000) {
            die('File is too large.');
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            die('Only JPG, JPEG, PNG & GIF files are allowed.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['department_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    }

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE department_tbl SET department_course = ?, department_status = ? WHERE department_id = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement (correcting the number of variables)
    mysqli_stmt_bind_param($stmt, "ssi", $department_course, $department_status, $department_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: Department.php");
    exit();
}
?>
