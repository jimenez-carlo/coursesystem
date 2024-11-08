<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/chair_students.css">
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
            <img src="main/img/psu_logo.png" alt="PSU Logo" style="height: 50px;">
            <span class="logo-text">Pangasinan State University</span>
        </a>


    </header>

    <main>
        <h2>DATA ANALYTICS</h2>
        <table class="students-table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Evaluation Status</th>
                    <th>Evaluation Feedback</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Last Name, First Name M.</td>
                    <td><a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#viewStatusModal">View</a></td>
                    <td><a href="#" class="btn-link" data-bs-toggle="modal" data-bs-target="#viewFeedbackModal">View</a></td>
            </tbody>
        </table>

        <!-- Feedback Modal -->
        <div class="modal fade" id="viewFeedbackModal" tabindex="-1" aria-labelledby="viewFeedbackModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewFeedbackModal">Evaluation Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Message Box for Input -->
                        <div class="mb-3">
                            <label for="studentMessage" class="form-label">Add a Message:</label>
                            <textarea id="studentMessage" class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveStatusButton">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evaluation Status Modal -->
        <div class="modal fade" id="viewStatusModal" tabindex="-1" aria-labelledby="viewStatusModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewStatusModal">Student Evaluation Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Dropdown for Evaluation Status -->
                        <div class="mb-3">
                            <label for="evaluationStatus" class="form-label">Select Evaluation Status:</label>
                            <select id="evaluationStatus" class="form-select">
                                <option value="evaluated">Evaluated</option>
                                <option value="incomplete">Incomplete</option>
                            </select>
                        </div>
                        <!-- Additional content can go here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveStatusButton">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="footer">
        <p>&copy; 2024 Pangasinan State University. All rights reserved.</p>
    </footer>

</body>

</html>