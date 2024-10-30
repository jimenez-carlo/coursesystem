<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Course Evaluation System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../../plugins/summernote/summernote-bs4.min.css">
  <style>
    #addButton:hover {
      color: #007bff;
      /* Change the color on hover, you can adjust this as needed */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../../dist/img/psu.png" alt="AdminLTELogo" height="200" width="200">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #01377D">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link" style="margin-left: -8%;">
        <img src="../../../dist/img/psu.png" alt="PSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="margin-left: -2%;">Course Evaluation System</span>
      </a>


      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" id="profileImageContainer" data-toggle="modal" data-target="#modal-default">
          <img src="../../../dist/img/profile.png" class="img-circle elevation-2" alt="Default Image" id="profileImage">
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
              <i class="nav-icon fab fa-leanpub"></i>
              <p>
                Educational Program
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/subject/subject.php" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/curriculum/curriculum.php" class="nav-link active">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Curriculum</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Transaction
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/coursesystem/pages/transaction/evaluated/evaluated.php" class="nav-link">
                  <i class="nav-icon fas fa-check"></i>
                  <p>Evaluated</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-leanpub"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/coursesystem/pages/process/student/student.php" class="nav-link">
                  <i class="nav icon fas fa-user"></i>
                  <p>Student</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="../logout/logout.php" class="nav-link logoutLink">
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
            <h1 style="font-weight: bold;">MANAGE CURRICULUM</h1>
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

                      <!-- Modal to display department details -->
                      <div class="modal" id="departmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Curriculum Details</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body" id="curriculumDetails">
                              <!-- Department details will be displayed here -->
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
                      <th>Curriculum Name</th>
                      <th>Curriculum Department</th>
                      <th>Curriculum Year</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include('../../../conn.php');

                    // Fetch data from curriculum_tbl
                    $sql = "SELECT c.*,d.department_course FROM curriculum_tbl c inner join department_tbl d on d.department_id = c.department_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                <td>" . $row["curriculum_name"] . "</td> 
                <td>" . $row["department_course"] . "</td>
                <td>" . $row["curriculum_year"] . "</td> ";

                        // Display button for Edit
                        echo "<td>
  <button type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-view' onclick='openViewDetailsModal(" . $row['curriculum_id'] . ")'><i class='fas fa-eye'></i></button>
  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' data-curriculum-id='" . $row['curriculum_id'] . "' data-department-id='" . $row['department_id'] . "' data-curriculum-year='" . $row['curriculum_year'] . "' data-curriculum-name='" . $row['curriculum_name'] . "'><i class='fas fa-edit'></i></button>
  <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row['curriculum_id'] . ")'><i class='fas fa-trash'></i></button>
  </td>";
                      }
                    } else {
                      echo "<tr><td colspan='5'>No data found</td></tr>";
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
  <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h5 class="modal-title" id="viewDetailsModalLabel">Subject Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="subject-details">
            <!-- Curriculum Report content goes here -->
            <div class="header">
              <h2>Curriculum Report</h2>
            </div>

            <!-- Student Information -->
            <div class="container">
              <h4>DELA CRUZ, JUAN D</h4>
              <p><strong>BSIT 2022-2023</strong> - Information Technology</p>
              <hr>

              <!-- First Year Details -->
              <h5>First Year</h5>
              <button class="btn btn-primary add-subject-btn" data-toggle="modal" data-target="#addSubjectModalFirstYear">Add Subject</button>
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Code #</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Semester</th>
                    <th>Co/Pre requisite</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CC 101</td>
                    <td>Introduction to Computing</td>
                    <td>3</td>
                    <td>1st Semester</td>
                    <td>None</td>
                  </tr>
                  <!-- Add more subjects as needed -->
                </tbody>
              </table>

              <!-- Second Year Details -->
              <h5>Second Year</h5>
              <button class="btn btn-primary add-subject-btn" data-toggle="modal" data-target="#addSubjectModalSecondYear">Add Subject</button>
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Code #</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Semester</th>
                    <th>Co/Pre requisite</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CC 104</td>
                    <td>Data Structure and Algorithm</td>
                    <td>3</td>
                    <td>1st Semester</td>
                    <td>CC 103</td>
                  </tr>
                  <!-- Add more subjects as needed -->
                </tbody>
              </table>

              <!-- Third Year Details -->
              <h5>Third Year</h5>
              <button class="btn btn-primary add-subject-btn" data-toggle="modal" data-target="#addSubjectModalThirdYear">Add Subject</button>
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Code #</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Semester</th>
                    <th>Co/Pre requisite</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>CC 106</td>
                    <td>Application Development</td>
                    <td>3</td>
                    <td>1st Semester</td>
                    <td>None</td>
                  </tr>
                  <!-- Add more subjects as needed -->
                </tbody>
              </table>

              <!-- Fourth Year Details -->
              <h5>Fourth Year</h5>
              <button class="btn btn-primary add-subject-btn" data-toggle="modal" data-target="#addSubjectModalFourthYear">Add Subject</button>
              <table class="table table-bordered table-striped">
                <thead class="table-light">
                  <tr>
                    <th>Code #</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Semester</th>
                    <th>Co/Pre requisite</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>FIL 2</td>
                    <td>Filipino sa Iba't Ibang Disiplina</td>
                    <td>3</td>
                    <td>1st Semester</td>
                    <td>None</td>
                  </tr>
                  <!-- Add more subjects as needed -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Subject Modal for First Year -->
  <div class="modal fade" id="addSubjectModalFirstYear" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabelFirstYear" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addSubjectModalLabelFirstYear">Add Subject for First Year</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <!-- Form fields for adding the subject -->
            <div class="form-group">
              <label for="subject_name">Subject Code:</label>
              <input type="text" class="form-control" id="subject_name" placeholder="Enter subject code">
            </div>
            <div class="form-group">
              <label for="subject_title">Subject Title</label>
              <input type="text" class="form-control" id="subject_title" placeholder="Enter subject title">
            </div>
            <div class="form-group">
              <label for="subject_unit">Subejct Unit:</label>
              <input type="number" class="form-control" id="units" placeholder="Enter number of units">
            </div>
            <div class="form-group">
              <label for="subject_prerequisite">Co/Pre requisite:</label>
              <input type="text" class="form-control" id="prerequisite" placeholder="Enter prerequisite (if any)">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Subject</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Repeat similar modals for Second, Third, and Fourth Year with unique IDs -->
  <div class="modal fade" id="addSubjectModalSecondYear" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabelSecondYear" aria-hidden="true">
    <!-- Second year modal content -->
  </div>

  <div class="modal fade" id="addSubjectModalThirdYear" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabelThirdYear" aria-hidden="true">
    <!-- Third year modal content -->
  </div>

  <div class="modal fade" id="addSubjectModalFourthYear" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabelFourthYear" aria-hidden="true">
    <!-- Fourth year modal content -->
  </div>


  <!-- ADD CHECKLIST MODAL -->
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h4 class="modal-title">Add Curriculum</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="add_curriculum.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="department-id" class="font-weight-bold">Department:</label>
              <select class="form-control" id="department-id" name="department_id" required>
                <option value="">Select Department</option>
                <?php
                include('../../../conn.php');

                // Fetch data from curriculum_tbl
                $sql = "SELECT * FROM department_tbl where department_status = 'Active'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) { ?>

                    <option value="<?= $row['department_id'] ?>"><?= $row['department_course'] ?></option>
                <?php
                  }
                }

                // Close the database connection
                $conn->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="curriculum_name">Curriculum Name:</label>
              <input type="text" class="form-control" id="curriculum_name" name="curriculum_name" required>
              <div class="form-group">
                <label for="curriculum_year">Curriculum Year:</label>
                <input type="text" class="form-control" id="curriculum_year" name="curriculum_year" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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


  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- EDIT CURRICULUM MODAL -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h4 class="modal-title">Edit Curriculum</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="edit_curriculum.php" method="POST">
            <input type="hidden" id="curriculum_id" name="curriculum_id">
            <div class="form-group">
              <label for="curriculum_course" class="font-weight-bold">Department:</label>
              <select class="form-control" id="department-id" name="department_id" required>
                <option value="">Select Course</option>
                <?php
                include('../../../conn.php');

                // Fetch data from curriculum_tbl
                $sql = "SELECT * FROM department_tbl where department_status = 'Active'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) { ?>

                    <option value="<?= $row['department_id'] ?>"><?= $row['department_course'] ?></option>
                <?php
                  }
                }

                // Close the database connection
                $conn->close();
                ?>
              </select>
              <label for="curriculum_name">Curriculum Name:</label>
              <input type="text" class="form-control" id="curriculum_name" name="curriculum_name" required>
              <div class="form-group">
                <label for="curriculum_year">Curriculum Year:</label>
                <input type="text" class="form-control" id="curriculum_year" name="curriculum_year" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
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
  <script src="../../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../../../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../../../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../../../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../../../plugins/moment/moment.min.js"></script>
  <script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../../../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../../../dist/js/pages/dashboard.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    // JavaScript to handle the view details button click and scroll to the relevant section
    function openViewDetailsModal(curriculumId) {
      // Show the modal
      $('#viewDetailsModal').modal('show');

      // Based on the curriculum ID, scroll to the respective year
      let yearSection = '';

      switch (curriculumId) {
        case 1: // Example for first year
          yearSection = '#first-year';
          break;
        case 2: // Example for second year
          yearSection = '#second-year';
          break;
        case 3: // Example for third year
          yearSection = '#third-year';
          break;
        case 4: // Example for fourth year
          yearSection = '#fourth-year';
          break;
        default:
          yearSection = '';
          break;
      }

      if (yearSection !== '') {
        // Scroll to the section
        $('html, body').animate({
          scrollTop: $(yearSection).offset().top
        }, 1000);
      }
    }

    // Script to handle opening the edit modal and passing the department_id
    $(document).ready(function() {
      $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var curriculumId = button.data('curriculum-id'); // Extract department_id from data-attribute
        var departmentId = button.data('department-id'); // Extract department_id from data-attribute
        var curriculumName = button.data('curriculum-name'); // Extract department_id from data-attribute
        var curriculumYear = button.data('curriculum-year'); // Extract department_id from data-attribute
        var modal = $(this);
        modal.find('.modal-body #curriculum_id').val(curriculumId); // Set the department_id in the modal form
        modal.find('.modal-body #department-id').val(departmentId); // Set the department_id in the modal form
        modal.find('.modal-body #curriculum_name').val(curriculumName); // Set the department_id in the modal form
        modal.find('.modal-body #curriculum_year').val(curriculumYear); // Set the department_id in the modal form
      });
    });


    function confirmDelete(codeId) {
      swal({
        title: "Are you sure you want to delete this Curriculum?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          // You can add the success message here after deletion if needed
          swal("Poof! Curriculum has been deleted!", {
            icon: "success",
          }).then(() => {
            // Redirect to the delete script with the user ID
            window.location.href = 'delete_curriculum.php?curriculum_id=' + codeId;
          });
        } else {
          swal("Curriculum is safe!");
          // If canceling deletion, you might not need to perform any action here

        }
      });
    }

    function deactivateDepartment(departmentId) {
      // Implement your deactivate logic, e.g., update user_account_status to 'Deactivated'
      if (confirm("Are you sure you want to deactivate this department?")) {
        // Make an AJAX request or redirect to a PHP script to handle deactivation
        window.location.href = 'deactivate_department.php?id=' + departmentId;
      }
    }

    function activateDepartment(departmentId) {
      // Implement your activate logic, e.g., update user_account_status to 'Active'
      if (confirm("Are you sure you want to activate this department?")) {
        // Make an AJAX request or redirect to a PHP script to handle activation
        window.location.href = 'activate_department.php?id=' + departmentId;
      }
    }

    // Handle input change and fetch suggestions
    $(document).ready(function() {
      $('#searchQuery').on('input', function() {
        var searchQuery = $(this).val();
        if (searchQuery.length >= 1) {
          $.ajax({
            type: 'POST',
            url: 'get_live_search_results.php', // PHP file to handle the AJAX request
            data: {
              searchQuery: searchQuery
            },
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
        var departmentName = $(this).text();
        // Open the modal
        $('#departmentModal').modal('show');
        // Fetch and display department details in the modal
        $.ajax({
          type: 'POST',
          url: 'get_department_details.php', // PHP file to handle the AJAX request
          data: {
            departmentName: departmentName
          },
          success: function(response) {
            $('#departmentDetails').html(response);
          }
        });
      });
    });
  </script>
  </script>
  </script>
</body>

</html>