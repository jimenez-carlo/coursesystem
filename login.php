<?php
session_start();
require 'conn.php'; // Assuming 'conn.php' contains your mysqli connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query using mysqli
    $check_email_query = "SELECT * FROM admin_tbl WHERE admin_email = ?";
    $stmt = $conn->prepare($check_email_query);

    // Check if the prepared statement was successful
    if ($stmt) {
        // Bind the email to the query (s indicates string)
        $stmt->bind_param("s", $email);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Verify the password
        if ($user && password_verify($password, $user['admin_password'])) {
            // Set session variables for logged-in user
            $_SESSION['user_id'] = $user['admin_id']; // Assuming 'admin_id' is the id column
            $_SESSION['user_name'] = $user['admin_name']; // Assuming 'admin_name' is the name column
            header("Location: final_index.php"); // Redirect to a dashboard page after login
            exit();
        } else {
            $error = "Invalid email or password";
        }

        // Close the statement
        $stmt->close();
    } else {
        $error = "Database query failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Course Evaluation System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
  <link rel="stylesheet" href="ulogin.css"> <!-- Custom styles for the login page -->
</head>
<body>

    <!-- Header Section -->
    <header class="header">
        <a href="#" class="logo">
            <img src="main/img/psu_logo.png" alt="PSU Logo">
            <span class="logo-text">Pangasinan State University Course Evaluation System</span>
        </a>
    </header>

    <!-- Login Container -->
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="POST"> <!-- Form action refers to the current page -->
                <h1>Sign In</h1>
                <?php if (isset($error)): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                <a href="#">Forgot Your Password?</a>
                <button type="submit" id="signIn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img src="main/img/psu_logo.png" alt="Hello Friend Logo" class="logo-image">
                    <p>Enter your personal details to use all of site features</p>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    swal({
          title: "Are you sure you want to logout?",
          text: "Logging out will end your session.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willLogout) => {
          if (willLogout) {
            // Redirect to logout page or perform logout action
            window.location.href = "logout.php";
          } else {
            swal("You're still logged in!");
          }
        });
        


</body>
</html>