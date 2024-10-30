<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendation</title>
    <link rel="stylesheet" href="/css/recommendation.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                            <a href="#">1st Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">2nd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">3rd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">4th Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="checklist.php">1st Semester</a></li>
                                <li><a href="checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li><a href="allyear_checklist.php">All Year</a></li>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle active">Recommendations</a>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="recommendation.php">1st Year</a></li>
                        <li><a href="recommendation.php">2nd Year</a></li>
                        <li><a href="recommendation.php">3rd Year</a></li>
                        <li><a href="recommendation.php">4th Year</a></li>
                        <li><a href="recommendation.php">All Year</a></li>
                    </ul>
                </div>
            </div>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Individual Evaluation Report</a>
                <div class="dropdown-content">
                    <ul>
                        <li class="has-submenu">
                            <a href="#">1st Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="ier.php">1st Semester</a></li>
                                <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">2nd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                            <li><a href="ier.php">1st Semester</a></li>
                            <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">3rd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                            <li><a href="ier.php">1st Semester</a></li>
                            <li><a href="ier.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li><a href="recommendation.php">4th Year</a></li>
                        <li><a href="recommendation.php">All Year</a></li>
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

    <!-- New Form Section Below Header -->
 <div class="student-info">
     <form>
         <div class="form-row">
             <div class="form-group">
                 <label for="student-name">Name:</label>
                 <input type="text" id="student-name" readonly>
             </div>
             <div class="form-group">
                 <label for="student-id">Student ID:</label>
                 <input type="text" id="student-id" readonly>
             </div>
         </div>
     </form>
 </div>
 
    <div class="main-content">
        <h2>First Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>PE 4</td>
                    <td>Physical Activity Towards Health and Fitness</td>
                    <td>2</td>
                    <td>PE 3</td>
                </tr>
            </tbody>
        </table>
        
        <h2>Second Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>PE 3</td>
                    <td>Physical Activity Towards Health and Fitness</td>
                    <td>2</td>
                    <td>PE 2</td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>
</body>
</html>
