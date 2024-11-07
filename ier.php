<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Evaluation Report</title>
    <link rel="stylesheet" href="css/ier.css">
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
                        <a href="">All Year<i class=""></i></a>
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
                <a href="#" class="dropdown-toggle active">Individual Evaluation Report</a>
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
                        <a href="">All Year<i class=""></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="profile">
            <a href="profile.php"><i class="bi bi-person"></i></a>
            <a href="login.php"><i class="bi bi-box-arrow-right"></i></a>
        </nav>
    </header>

    <div class="last-updated" id="last-updated"></div>


    <main class="main-content">
        <img src="main/img/IER Sample.png" alt="Main Image" class="centered-image">
        <label for="file-upload" class="custom-upload-btn">Upload Individual Evaluation Report</label>
        <input type="file" id="file-upload" class="upload-btn" accept="image/*">
    </main>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('last-updated').textContent = 'Last updated on: ' + document.lastModified;
    </script>


</body>

</html>