<?php
// Include database connection file
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch data from the form
    $student_no = $_POST['student_no'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $address = $_POST['address'];
    $telephone_no = $_POST['telephone_no'];
    $email = $_POST['email'];

    // Check if all fields have values
    if (isset($student_no, $last_name, $first_name, $middle_name, $address, $telephone_no, $email)) {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO users_tbl (student_no, last_name, first_name, middle_name, address, telephone_no, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $student_no, $last_name, $first_name, $middle_name, $address, $telephone_no, $email);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Profile saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Error: Missing required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <img src="main/img/psu_logo.png" alt="PSU Logo">
            <span class="logo-text">Pangasinan State University</span>
        </a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Curriculum Checklist</a>
                <div class="dropdown-content">
                    <ul>
                        <li class="has-submenu">
                            <a href="">1st Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="">2nd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="">3rd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="">4th Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <a href="allyear_checklist.php">All Year<i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Recommendations</a>
                <div class="dropdown-content">
                    <ul>
                        <li class="has-submenu">
                            <a href="recommendation.php">1st Year</i></a>

                        <li class="has-submenu">
                            <a href="recommendation.php">2nd Year</i></a>

                        <li class="has-submenu">
                            <a href="recommendation.php">3rd Year</i></a>

                        <li class="has-submenu">
                            <a href="recommendation.php">4th Year</i></a>

                            <a href="recommendation.php">All Year<i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Individual Evaluation Report</a>
                <div class="dropdown-content">
                    <ul>
                        <li class="has-submenu">
                            <a href="">1st Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="ier.php">1st Semester</a></li>
                                <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="">2nd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="ier.php">1st Semester</a></li>
                                <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="">3rd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="ier.php">1st Semester</a></li>
                                <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="">4th Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="ier.php">1st Semester</a></li>
                                <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <a href="allyear_checklist.php">All Year<i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <nav class="profile">
            <a href="profile.php" class="active"><i class="bi bi-person"></i></a>
            <a href="login.php"><i class="bi bi-box-arrow-right"></i></a>
        </nav>
    </header>
    <main class="main-content">
        <div class="container">
            <div class="profile-card">
                <div class="image-upload">
                    <img src="main/img/user.png" alt="Profile Image" class="profile-image">
                    <label for="file-input" class="upload-btn">Upload a new image</label>
                    <input id="file-input" type="file" style="display: none;">
                </div>
                <form action="profile.php" method="POST">
                    <div class="form-group">
                        <label for="studentNo">Student ID:</label>
                        <input type="text" id="studentId" name="studentId" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="last_name" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="first_name" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="middleName">Middle Name:</label>
                        <input type="text" id="middle_name" name="middleName" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" id="address" cols="30" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telephoneNo">Telephone No.:</label>
                        <input type="tel" id="telephone_no" name="telephoneNo" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="username" name="email" required>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn-submit">Save</button>
                        <button type="reset" class="btn-edit">Edit</button>
                        <button type="reset" class="btn-reset">Reset</button>
                    </div>
                </form>

    </main>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>
</body>

</html>