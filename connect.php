<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM admin_tbl WHERE admin_email = ? AND admin_password = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $Email, $Password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch the row
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Get the number of rows
    $count = mysqli_num_rows($result);

    // Close the statement
    mysqli_stmt_close($stmt);

    if ($count == 1) {
        if ($row['admin_position'] == 'Registrar') {
            header("Location: final_index.php");
            exit();
        } else {
            header("Location: admin.php");
            exit();
        }
    } else {
        echo '<script>alert("Incorrect email or password. Please try again."); window.location.href="login.php";</script>';
    }
}
?>