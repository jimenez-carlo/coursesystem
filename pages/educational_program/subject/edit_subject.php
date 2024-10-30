
<?php
require_once('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code_id = isset($_POST['code_id']) ? mysqli_real_escape_string($conn, $_POST['code_id']) : '';
    $subject_name = isset($_POST['subject_name']) ? mysqli_real_escape_string($conn, $_POST['subject_name']) : '';
    $subject_title = isset($_POST['subject_title']) ? mysqli_real_escape_string($conn, $_POST['subject_title']) : '';
    $subject_unit = isset($_POST['subject_unit']) ? mysqli_real_escape_string($conn, $_POST['subject_unit']) : '';
    $subject_prerequisite = isset($_POST['subject_prerequisite']) ? mysqli_real_escape_string($conn, $_POST['subject_prerequisite']) : '';

    // Prepare the SQL update statement
    $sql_update = "UPDATE subject_tbl SET subject_name = ?, subject_title = ?, subject_unit = ?, subject_prerequisite = ? WHERE code_id = ?";
    $stmt = mysqli_prepare($conn, $sql_update);

    if (!$stmt) {
        die('SQL Error: ' . mysqli_error($conn)); // Error handling
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssi", $subject_name, $subject_title, $subject_unit, $subject_prerequisite, $code_id);

    // Execute the statement
    $update_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$update_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Redirect after successful update
    header("Location: subject.php");
    exit();
}

$conn->close();
?>
