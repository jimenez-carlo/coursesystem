<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Checklist</title>
    <link rel="stylesheet" href="allyear_checklist.css">
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
                <a href="#" class="dropdown-toggle active">Curriculum Checklist</a>
                <div class="dropdown-content">
                    <ul>
                        <li class="has-submenu">
                            <a href="">1st Year <i class="bi bi-chevron-right"></i></a>
                                    <ul class="submenu">
                                        <li><a href="first_checklist.php">1st Semester</a></li>
                                        <li><a href="second_checklist.php">2nd Semester</a></li>
                                    </ul>
                                </li>
                        <li class="has-submenu">
                            <a href="">2nd Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="first_checklist.php">1st Semester</a></li>
                                <li><a href="second_checklist.php">2nd Semester</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="">3rd Year <i class="bi bi-chevron-right"></i></a>
                                    <ul class="submenu">
                                        <li><a href="first_checklist.php">1st Semester</a></li>
                                        <li><a href="second_checklist.php">2nd Semester</a></li>
                                    </ul>
                                </li>
                        <li class="has-submenu">
                            <a href="">4th Year <i class="bi bi-chevron-right"></i></a>
                            <ul class="submenu">
                                <li><a href="first_checklist.php">1st Semester</a></li>
                                <li><a href="second_checklist.php">2nd Semester</a></li>
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

    <div id="print-section">
        <h1>First Year</h1>
        <h2>First Semester</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Second Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>Second Year</h1>
    <h2>First Semester</h2>
    <table>
        <thead>
            <tr>
                <th>Grade</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</th>
                <th>Pre-requisite</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Second Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>Third Year</h1>
    <h2>First Semester</h2>
    <table>
        <thead>
            <tr>
                <th>Grade</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</th>
                <th>Pre-requisite</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Second Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>Fourth Year</h1>
    <h2>First Semester</h2>
    <table>
        <thead>
            <tr>
                <th>Grade</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</th>
                <th>Pre-requisite</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>Second Semester</h2>
        <table>
            <thead>
                <tr>
                    <th>Grade</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Pre-requisite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
                <tr>
                    <td>
                        <select>
                            <option value="" disabled selected>Select Grade</option>
                            <option value="1.0">1.0</option>
                            <option value="1.25">1.25</option>
                            <option value="1.5">1.5</option>
                            <option value="1.75">1.75</option>
                            <option value="2.0">2.0</option>
                            <option value="2.25">2.25</option>
                            <option value="2.5">2.5</option>
                            <option value="2.75">2.75</option>
                            <option value="3.0">3.0</option>
                            <option value="5.0">5.0</option>
                            <option value="INC">INC</option>
                            <option value="DRP">DRP</option>
                        </select>
                    </td>
                    <td>CC 105</td>
                    <td>Information Management 1 (Fund. of Database)</td>
                    <td>2/1</td>
                    <td>CC 104</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h1>Summer Class</h1>
    <table>
        <thead>
            <tr>
                <th>Grade</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Unit</th>
                <th>Pre-requisite</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select>
                        <option value="" disabled selected>Select Grade</option>
                        <option value="1.0">1.0</option>
                        <option value="1.25">1.25</option>
                        <option value="1.5">1.5</option>
                        <option value="1.75">1.75</option>
                        <option value="2.0">2.0</option>
                        <option value="2.25">2.25</option>
                        <option value="2.5">2.5</option>
                        <option value="2.75">2.75</option>
                        <option value="3.0">3.0</option>
                        <option value="5.0">5.0</option>
                        <option value="INC">INC</option>
                        <option value="DRP">DRP</option>
                    </select>
                </td>
                <td>CC 105</td>
                <td>Information Management 1 (Fund. of Database)</td>
                <td>2/1</td>
                <td>CC 104</td>
            </tr>
        </tbody>
    </table>
</div>

    <div class="button-container">
    <form action="generate_pdf.php" method="post" style="display:inline;">
    <button class="print-button" onclick="printPart()">Print/Download</button>
    </form>
    </div>
    
     <script>
        document.getElementById('last-updated').textContent = 'Last updated on: ' + document.lastModified;
    </script>

    <div class="footer-buttons">
        <button type="button" id="save-btn">Save</button>
        <button type="button" id="edit-btn">Edit</button>
        <button type="reset" id="reset-btn">Reset</button>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>
    

</body>
</html>

