<?php
include("../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the keys exist in the $_POST array
    $user_id = isset($_POST['user_id']) ? mysqli_real_escape_string($conn, $_POST['user_id']) : '';
    $user_firstname = isset($_POST['user_firstname']) ? mysqli_real_escape_string($conn, $_POST['user_firstname']) : '';
    $user_middlename = isset($_POST['user_middlename']) ? mysqli_real_escape_string($conn, $_POST['user_middlename']) : '';
    $user_lastname = isset($_POST['user_lastname']) ? mysqli_real_escape_string($conn, $_POST['user_lastname']) : '';
    $user_age = isset($_POST['user_age']) ? mysqli_real_escape_string($conn, $_POST['user_age']) : '';
    $user_gender = isset($_POST['user_gender']) ? mysqli_real_escape_string($conn, $_POST['user_gender']) : '';
    $user_mobile = isset($_POST['user_mobile']) ? mysqli_real_escape_string($conn, $_POST['user_mobile']) : '';
    $user_email = isset($_POST['user_email']) ? mysqli_real_escape_string($conn, $_POST['user_email']) : '';

    // File upload handling
    $target_directory = "uploads/";

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

        // Check file size (you can adjust this value)
        if ($_FILES['user_profile']['size'] > 1000000) {
            die('File is too large.');
        }

        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            die('Only JPG, JPEG, PNG & GIF files are allowed.');
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES['user_profile']['tmp_name'], $target_file)) {
            die('File upload failed. Please try again.');
        }
    } else {
        // If no new profile image uploaded, keep the existing profile image
        $target_file = ''; // Assuming this is the default value if no new image is uploaded
    }

    // Use prepared statements to prevent SQL injection
    $sql_update = "UPDATE user_tbl SET user_firstname = ?, user_middlename = ?, user_lastname = ?, user_age = ?, user_gender = ?, user_mobile = ?, user_email = ?, user_profile = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql_update);

    // Bind parameters to the prepared statement 
    mysqli_stmt_bind_param($stmt, "ssssssssi", $user_firstname, $user_middlename, $user_lastname, $user_age, $user_gender, $user_mobile, $user_email, $target_file, $user_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Debugging output
    echo "Update successful";

    // Redirect to the user.php page after successful update
    header("Location:/coursesystem/pages/user/user.php");
    exit();
}
?>
