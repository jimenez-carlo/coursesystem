<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $user_firstname = isset($_POST['user_firstname']) ? mysqli_real_escape_string($conn, $_POST['user_firstname']) : '';
    $user_middlename = isset($_POST['user_middlename']) ? mysqli_real_escape_string($conn, $_POST['user_middlename']) : '';
    $user_lastname = isset($_POST['user_lastname']) ? mysqli_real_escape_string($conn, $_POST['user_lastname']) : '';
    $user_age = isset($_POST['user_age']) ? mysqli_real_escape_string($conn, $_POST['user_age']) : '';
    $user_gender = isset($_POST['user_gender']) ? mysqli_real_escape_string($conn, $_POST['user_gender']) : '';
    $user_mobile = isset($_POST['user_mobile']) ? mysqli_real_escape_string($conn, $_POST['user_mobile']) : '';
    $user_email = isset($_POST['user_email']) ? mysqli_real_escape_string($conn, $_POST['user_email']) : '';
// Retrieve user input
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : '';

// Hash the password using bcrypt
$hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

// If you want to use mysqli_real_escape_string, you can do so after hashing the password
$user_password = isset($_POST['user_password']) ? mysqli_real_escape_string($conn, $hashed_password) : '';

    
    // File upload handling
    $target_directory = "../../uploads/";

    // Check if the target directory exists, if not, create it
    if (!file_exists($target_directory)) {
        if (!mkdir($target_directory, 0777, true)) {
            die('Failed to create target directory. Please check file permissions.');
        }
    }

    // Check if the file field is set
    if (!empty($_FILES['user_profile']['name'])) {
        $user_profile = $_FILES['user_profile']['name'];

        // Generate a unique filename
        $target_file = $target_directory . uniqid() . '_' . basename($user_profile);

        // Check if file is an actual image
        $check = getimagesize($_FILES['user_profile']['tmp_name']);
        if (!$check) {
            die('File is not an image.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['user_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    } else {
        // If no file is uploaded, set $target_file to empty string
        $target_file = '';
    }

    // Use prepared statements to prevent SQL injection
    $sql_insert = "INSERT INTO user_tbl (user_firstname, user_middlename, user_lastname, user_age, user_gender, user_mobile, user_email, user_password, user_profile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssss", $user_firstname, $user_middlename, $user_lastname, $user_age, $user_gender, $user_mobile, $user_email, $user_password, $target_file);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Redirect to user.php after successful insertion
    header("Location: user.php");
    exit();
}
?>
