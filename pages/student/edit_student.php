<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $student_id = isset($_POST['student_id']) ? mysqli_real_escape_string($conn, $_POST['student_id']) : '';
    $student_firstname = isset($_POST['student_firstname']) ? mysqli_real_escape_string($conn, $_POST['student_firstname']) : '';
    $student_middlename = isset($_POST['student_middlename']) ? mysqli_real_escape_string($conn, $_POST['student_middlename']) : '';
    $student_lastname = isset($_POST['student_lastname']) ? mysqli_real_escape_string($conn, $_POST['student_lastname']) : '';
    $student_gender = isset($_POST['student_gender']) ? mysqli_real_escape_string($conn, $_POST['student_gender']) : '';
    $student_age = isset($_POST['student_age']) ? mysqli_real_escape_string($conn, $_POST['student_age']) : '';
    $student_birthday = isset($_POST['student_birthday']) ? mysqli_real_escape_string($conn, $_POST['student_birthday']) : '';
    $student_placeofbirth = isset($_POST['student_placeofbirth']) ? mysqli_real_escape_string($conn, $_POST['student_placeofbirth']) : '';
    $student_civilstatus = isset($_POST['student_civilstatus']) ? mysqli_real_escape_string($conn, $_POST['student_civilstatus']) : '';
    $student_address = isset($_POST['student_address']) ? mysqli_real_escape_string($conn, $_POST['student_address']) : '';
    $student_mobile = isset($_POST['student_mobile']) ? mysqli_real_escape_string($conn, $_POST['student_mobile']) : '';
    $student_email = isset($_POST['student_email']) ? mysqli_real_escape_string($conn, $_POST['student_email']) : '';
    $student_status = isset($_POST['student_status']) ? mysqli_real_escape_string($conn, $_POST['student_status']) : '';
   

    // File upload handling
    $target_directory = "uploads/";

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

        // Check if file already exists
        if (file_exists($target_file)) {
            die('File already exists.');
        }

        // Check file size (you can adjust this value)
        if ($_FILES['student_profile']['size'] > 1000000) {
            die('File is too large.');
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            die('Only JPG, JPEG, PNG & GIF files are allowed.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['student_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    }

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE student_tbl SET student_firstname = ?, student_middlename = ?, student_lastname = ?, student_gender = ?, student_age = ?, student_birthday = ?, student_placeofbirth = ?, student_civilstatus = ?, student_address = ?, student_mobile = ?, student_email = ?, student_status = ?, student_profile = ? WHERE student_id = ?";
    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssssssssi", $student_firstname, $student_middlename, $student_lastname, $student_gender, $student_age, $student_birthday, $student_placeofbirth, $student_civilstatus, $student_address, $student_mobile, $student_email, $student_status, $target_file, $student_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    } 

    // Redirect after successful update
    header("Location: student.php");
    exit();
}
?>
