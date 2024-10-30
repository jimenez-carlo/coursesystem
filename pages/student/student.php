<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Course Evaluation System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
  <style>
    #addButton:hover {
    color: #007bff; /* Change the color on hover, you can adjust this as needed */
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/psu.png" alt="AdminLTELogo" height="200" width="200">
  </div>
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"style="background-color: #01377D">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link"style="margin-left: -8%;">
      <img src="../../dist/img/psu.png" alt="PSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"style="margin-left: -2%;">Course Evaluation System</span>
    </a>

    
    <!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image" id="profileImageContainer" data-toggle="modal" data-target="#modal-default">
            <img src="../../dist/img/profile.png" class="img-circle elevation-2" alt="Default Image" id="profileImage">
    </div>
    <div class="info">
        <a href="#" class="d-block">Justine Lyssa Jumawid</a>
        <span style="color: white"> Admin </span>
    </div>
</div>

<!-- MODAL -->
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Profile Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="file" name="profile_image" id="uploadProfile" accept="image/*">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>


          <!-- Sidebar Menu -->
          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/coursesystem/final_index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/department/department.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/program/program.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
              Program
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/admin/admin.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/yearlevel/yearlevel.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              Year Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/semester/semester.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Semester
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Educational Program
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/course/course.php" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/curriculum/curriculum.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Curriculum</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../transaction/confirmation/confirmation.php" class="nav-link">
                  <i class="nav-icon fas fa-exclamation"></i>
                  <p>Confirmation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transaction/evaluated/evaluated.php" class="nav-link">
                  <i class="nav-icon fas fa-check"></i>
                  <p>Evaluated</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="../user/user.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../student/student.php" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Students
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="coursesystem/pages/logout/logout.php" class="nav-link logoutLink">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>STUDENTS</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-6">
                    <div class="input-group input-group-sm" style="width: 150px;">
                       
                            <!-- Modal to display user details -->
<div class="modal" id="userModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">User Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body" id="systemDetails">
                    <!-- user details will be displayed here -->
                </div>

            </div>
        </div>
    </div>
    <div id="searchResults" class="list-group"></div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="card-tools">
                            <button type="button" class="btn btn-default" id="addButton" data-toggle='modal' data-target='#modal-add'>
                                <i class="nav-icon fas fa-plus-square"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Profile</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Place of Birth</th>
            <th>Civil Status</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Status</th>
    
        </tr>
    </thead>
    <tbody>
    <?php
include('../../conn.php');

// Fetch data from users
$sql = "SELECT * FROM users ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='data:image/jpeg;base64," . base64_encode($row["student_profile"]) . "' alt='Student Profile' style='max-width: 50px; max-height: 50px;'></td>
                <td>" . $row["student_firstname"] . "</td> 
                <td>" . $row["student_middlename"] . "</td>
                <td>" . $row["student_lastname"] . "</td>
                <td>" . $row["student_gender"] . "</td>
                <td>" . $row["student_age"] . "</td>
                <td>" . $row["student_birthday"] . "</td>
                <td>" . $row["student_placeofbirth"] . "</td>
                <td>" . $row["student_civilstatus"] . "</td>
                <td>" . $row["student_address"] . "</td>
                <td>" . $row["student_mobile"] . "</td>
                <td>" . $row["student_email"] . "</td>
                <td>" . $row["student_status"] . "</td>
                <td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' data-student-id='" . $row['student_id'] . ")'>
                        <i class='fas fa-edit'></i>
                    </button>
                    <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row['student_id'] . ")'>
                        <i class='fas fa-trash'></i>
                    </button>
                <td>";
                
        // Display button for Deactivate/Activate based on status
        if ($row["student_status"] == 'Active') {
            echo "<button class='btn btn-danger' onclick='deactivateUser(" . $row['student_id'] . ")'>Deactivate</button>";
        } else {
            echo "<button class='btn btn-success' onclick='activateUser(" . $row['student_id'] . ")'>Activate</button>";
        }
        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='13'>No data found</td></tr>";
}

// Close the database connection
$conn->close();
?>



    </tbody>
</table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="add_student.php" method="POST" enctype="multipart/form-data">
                <input type="int" name="student_id" hidden>
                <input type="enum" name="student_status" hidden>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_firstname">First Name:</label>
                                <input type="text" class="form-control" id="student_firstname" name="student_firstname" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_middlename">Middle Name:</label>
                                <input type="text" class="form-control" id="student_middlename" name="student_middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_lastname">Last Name:</label>
                                <input type="text" class="form-control" id="student_lastname" name="student_lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_gender">Gender:</label>
                                <select class="form-control" id="student_gender" name="student_gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_age">Age:</label>
                                <input type="number" class="form-control" id="student_age" name="student_age" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_birthday">Birth Date:</label>
                                <input type="date" class="form-control" id="student_birthday" name="student_birthday" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_placeofbirth">Place of Birth:</label>
                                <input type="text" class="form-control" id="student_placeofbirth" name="student_placeofbirth" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_civilstatus">Civil Status:</label>
                                <select class="form-control" id="student_civilstatus" name="student_civilstatus" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_address">Address:</label>
                                <input type="text" class="form-control" id="student_address" name="student_address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_mobile">Mobile:</label>
                                <input type="tel" class="form-control" id="student_mobile" name="student_mobile" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_email">Email:</label>
                                <input type="text" class="form-control" id="student_email" name="student_email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_password">Password:</label>
                                <input type="password" class="form-control" id="student_password" name="student_password" required>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_status">Student Status:</label>
                                <select class="form-control" id="student_status" name="student_status" required>
                                    <option value="">Select Student Status</option>
                                    <option value="regular">Regular</option>
                                    <option value="irregular">Irregular</option>
                                    <option value="drop">Drop</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="student-profile" class="font-weight-bold">Student Profile:</label>
                        <input type="file" class="form-control-file" id="student-profile" name="student_profile" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>





        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

  <!-- EDIT USER MODAL -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h4 class="modal-title">Edit Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edit_student.php" method="POST">
                <input type="hidden" id="student_id" name="student_id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_firstname">First Name:</label>
                                <input type="text" class="form-control" id="student_firstname" name="student_firstname" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_middlename">Middle Name:</label>
                                <input type="text" class="form-control" id="student_middlename" name="student_middlename">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_lastname">Last Name:</label>
                                <input type="text" class="form-control" id="student_lastname" name="student_lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_gender">Gender:</label>
                                <select class="form-control" id="student_gender" name="student_gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_age">Age:</label>
                                <input type="number" class="form-control" id="student_age" name="student_age" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="student_birthday">Birth Date:</label>
                                <input type="date" class="form-control" id="student_birthday" name="student_birthday" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_placeofbirth">Place of Birth:</label>
                                <input type="text" class="form-control" id="student_placeofbirth" name="student_placeofbirth" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="student_civilstatus">Civil Status:</label>
                                <select class="form-control" id="student_civilstatus" name="student_civilstatus" required>
                                    <option value="">Select Civil Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_address">Address:</label>
                                <input type="text" class="form-control" id="student_address" name="student_address" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_mobile">Mobile:</label>
                                <input type="tel" class="form-control" id="student_mobile" name="student_mobile" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_email">Email:</label>
                                <input type="text" class="form-control" id="student_email" name="student_email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_password">Password:</label>
                                <input type="password" class="form-control" id="student_password" name="student_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="student_status">Student Status:</label>
                                <select class="form-control" id="student_status" name="student_status" required>
                                    <option value="">Select Student Status</option>
                                    <option value="regular">Regular</option>
                                    <option value="irregular">Irregular</option>
                                    <option value="drop">Drop</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        <label for="student_profile">Student Profile:</label>
                        <input type="file" class="form-control-file" id="student_profile" name="student_profile" accept="image/*">
                    </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.modal -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
  const logoutLink = document.querySelector('.logoutLink');

  if (logoutLink) {
    logoutLink.addEventListener('click', function(e) {
      e.preventDefault(); // Prevents the default action of the link

      swal({
        title: "Are you sure you want to logout?",
        text: "Logging out will end your session.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willLogout) => {
        if (willLogout) {
          // Redirect to logout page or perform logout action
          window.location.href = "../../logout.php";
        } else {
          swal("You're still logged in!");
        }
      });
    });
  }
});

function confirmDelete(studentId) {
    if (confirm('Are you sure you want to delete this student?')) {
        window.location.href = 'delete_student.php?student_id=' + studentId;
    }
}

  // Script to handle opening the edit modal and passing the student_id
  $(document).ready(function() {
    $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var studentId = button.data('student-id'); // Extract student_id from data-attribute
        var modal = $(this);
        modal.find('.modal-body #student_id').val(studentId); // Set the student_id in the modal form
    });
});

    function deactivateUser(userId) {
        // Implement your deactivate logic, e.g., update user_account_status to 'Deactivated'
        if (confirm("Are you sure you want to deactivate this user?")) {
            // Make an AJAX request or redirect to a PHP script to handle deactivation
            window.location.href = 'deactivate_user.php?id=' + userId;
        }
    }


    function activateUser(userId) {
        // Implement your activate logic, e.g., update user_account_status to 'Active'
        if (confirm("Are you sure you want to activate this user?")) {
            // Make an AJAX request or redirect to a PHP script to handle activation
            window.location.href = 'activate_user.php?id=' + userId;
        }
    }

       // Handle input change and fetch suggestions
       $(document).ready(function() {
            $('#searchQuery').on('input', function() {
                var searchQuery = $(this).val();
                if (searchQuery.length >= 1) {
                    $.ajax({
                        type: 'POST',
                        url: 'get_live_search_results_user.php', // PHP file to handle the AJAX request
                        data: { searchQuery: searchQuery },
                        success: function(response) {
                            $('#searchResults').html(response);
                        }
                    });
                } else {
                    $('#searchResults').html('');
                }
            });

            // Handle click on suggestion to open modal
            $('#searchResults').on('click', 'li', function() {
                var userFirstname = $(this).text();
                // Open the modal
                $('#userModal').modal('show');
                // Fetch and display user details in the modal
                $.ajax({
                    type: 'POST',
                    url: 'get_user_details.php', // PHP file to handle the AJAX request
                    data: { userFirstname: userFirstname },
                    success: function(response) {
                        $('#userDetails').html(response);
                    }
                });
            });
        });
    </script>
    </script>
</script>
</body>
</html>

