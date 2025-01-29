<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input required data
    $admin_email = isset($_POST['admin_email']) ? mysqli_real_escape_string($conn, $_POST['admin_email']) : '';
    $admin_password = isset($_POST['admin_password']) ? password_hash($_POST['admin_password'], PASSWORD_DEFAULT) : ''; // Hashing the password
    $admin_firstname = isset($_POST['admin_firstname']) ? mysqli_real_escape_string($conn, $_POST['admin_firstname']) : '';
    $admin_lastname = isset($_POST['admin_lastname']) ? mysqli_real_escape_string($conn, $_POST['admin_lastname']) : '';
    $admin_position = isset($_POST['admin_position']) ? mysqli_real_escape_string($conn, $_POST['admin_position']) : '';
    $admin_status = isset($_POST['admin_status']) ? mysqli_real_escape_string($conn, $_POST['admin_status']) : '';

    // Check if email already exists
    $check_email_query = "SELECT admin_email FROM admin_tbl WHERE admin_email = ?";
    $stmt = mysqli_prepare($conn, $check_email_query);
    mysqli_stmt_bind_param($stmt, "s", $admin_email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('The email you entered already exists. Please try again.'); window.history.back();</script>";
        exit();
    }

    // File upload handling
    $target_directory = "../../img/";

    // Check if the target directory exists, if not, create it
    if (!file_exists($target_directory) && !mkdir($target_directory, 0777, true)) {
        die('Failed to create target directory. Please check file permissions.');
    }

    $target_file = '';
    if (!empty($_FILES['admin_profile']['name'])) {
        $admin_profile = $_FILES['admin_profile']['name'];
        $target_file = $target_directory . uniqid() . '_' . basename($admin_profile);

        // Check if file is an actual image
        if (!getimagesize($_FILES['admin_profile']['tmp_name'])) {
            die('File is not an image.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['admin_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    }

    // Insert data into the database
    $sql_insert = "INSERT INTO admin_tbl (admin_email, admin_password, admin_firstname, admin_lastname, admin_position, admin_status, admin_profile) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, "sssssss", $admin_email, $admin_password, $admin_firstname, $admin_lastname, $admin_position, $admin_status, $target_file);
    $insert_query = mysqli_stmt_execute($stmt);

    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: Admin.php");
    exit();
}
