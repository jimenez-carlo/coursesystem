<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST['admin_id'] ?? '';
    $admin_email = $_POST['admin_email'] ?? '';
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT); // Secure password hashing
    $admin_firstname = $_POST['admin_firstname'] ?? '';
    $admin_lastname = $_POST['admin_lastname'] ?? '';
    $admin_position = $_POST['admin_position'] ?? '';
    $admin_status = $_POST['admin_status'] ?? '';

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
    } else {
        // Fetch current profile image if no new image is uploaded
        $result = mysqli_query($conn, "SELECT admin_profile FROM admin_tbl WHERE admin_id = '$admin_id'");
        $row = mysqli_fetch_assoc($result);
        $target_file = $row['admin_profile']; // Keep the existing image
    }

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE admin_tbl SET admin_email = ?, admin_profile = ?, admin_password = ?, admin_firstname = ?, admin_lastname = ?, admin_position = ?, admin_status = ? WHERE admin_id = ?";
    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssi", $admin_email, $target_file, $admin_password, $admin_firstname, $admin_lastname, $admin_position, $admin_status, $admin_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect after successful update
    header("Location: admin.php");
    exit();
}
?>
