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

    <?php
    include("../../../conn.php");

    if (isset($_GET['id'])) {

      // Use a prepared statement to prevent SQL injection
      $sql = "SELECT * FROM curriculum_tbl c inner join year_semester_tbl ys on ys.year_semester_id = c.year_semester_id WHERE c.curriculum_id = ? ";

      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $data = mysqli_fetch_assoc($result);

      mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-weight: bold;"><?= $data['curriculum_name'] . " CURRICULUM  S.Y. " . $data['year_from'] . " - " . $data['year_to'] ?> </h1>
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
                      <a href="curriculum.php" class="btn btn-default">
                        <i class="fa-solid fa-backward"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
            </div>
            <?php
            include('../../../conn.php');

            // Fetch data from curriculum_tbl
            $sql = "SELECT * from curriculum_details_tbl cd inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.sem_id = cd.semester_id where cd.curriculum_id = '" . $_GET['id'] . "' GROUP BY y.year_id,ss.sem_id ORDER BY y.year_id,ss.sem_id ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Output data of each row
              while ($row = $result->fetch_assoc()) {

            ?>
                <div class="card mt-5 mb-5">
                  <div class="card-header" style="font-weight:bold"><?= $row['year_year'] ?> <span style="float:right"> <?= $row['semester'] ?></span></div>
                  <div class="card-body">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Code#</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Co/Prerequisite</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          include('../../../conn.php');

                          // Fetch data from curriculum_tbl
                          $sql2 = "SELECT * from curriculum_details_tbl cd inner join subject_tbl s on s.code_id = cd.code_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.sem_id = cd.semester_id where cd.curriculum_id = '" . $_GET['id'] . "' AND y.year_id = '" . $row['year_id'] . "' AND ss.sem_id = '" . $row['semester_id'] . "' ORDER BY y.year_id,ss.sem_id ";
                          $result2 = $conn->query($sql2);

                          if ($result2->num_rows > 0) {
                            // Output data of each row
                            while ($row2 = $result2->fetch_assoc()) {
                              echo "<tr>
                <td>" . $row2["subject_name"] . "</td>
                <td>" . $row2["subject_title"] . "</td> 
                <td>" . $row2["subject_unit"] . "</td>
                <td>" . $row2["subject_prerequisite"] . "</td>";

                              // Display button for Edit
                              echo "<td>
  <!-- <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' data-curriculum-id='" . $row2['curriculum_id'] . "' data-code-id='" . $row2['code_id'] . "' data-year-id='" . $row2['year_id'] . "' data-semester-id='" . $row2['semester_id'] . "' ><i class='fas fa-edit'></i></button> -->
  <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row2['cdetails_id'] . ")'><i class='fas fa-trash'></i></button>
  </td>";
                            }
                          } else {
                            echo "<tr><td colspan='5'>No data found</td></tr>";
                          }

                          // Close the database connection
                          ?>


                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>


            <?php  }
            } else {
            }

            // Close the database connection
            // $conn->close();
            ?>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





  <!-- ADD MODAL -->
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h4 class="modal-title">Add Subject</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="add_subject.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="curriculum_id" value="<?= $_GET['id'] ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="year-id" class="font-weight-bold">Year:</label>
              <select class="form-control" id="year-id" name="year_id" required>
                <option value="">Select Year</option>
                <?php
                include('../../../conn.php');

                // Fetch data from curriculum_tbl
                $sql = "SELECT * FROM year_levels_tbl where yearlevel_status = 'Active'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['year_id'] ?>"><?= $row['year_year']; ?></option>
                <?php
                  }
                }

                // Close the database connection
                $conn->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="semester-id" class="font-weight-bold">Semester:</label>
              <select class="form-control" id="semester-id" name="semester_id" required>
                <option value="">Select Semester</option>
                <?php
                include('../../../conn.php');

                // Fetch data from curriculum_tbl
                $sql = "SELECT * FROM semester_tbl where sem_status = 'Active'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['sem_id'] ?>"><?= $row['semester']; ?></option>
                <?php
                  }
                }

                // Close the database connection
                $conn->close();
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subject-id" class="font-weight-bold">Subject:</label>
              <select class="form-control" id="subject-id" name="subject_id" required>
                <option value="">Select Subject</option>
                <?php
                include('../../../conn.php');

                // Fetch data from curriculum_tbl
                $sql = "SELECT * FROM subject_tbl where course_status = 'Active'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row
                  while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['code_id'] ?>"><?= $row['subject_name'] . " - " . $row['subject_title'] ?></option>
                <?php
                  }
                }

                // Close the database connection
                $conn->close();
                ?>
              </select>
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

    // Script to handle opening the edit modal and passing the department_id
    $(document).ready(function() {
      $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var curriculumId = button.data('curriculum-id'); // Extract department_id from data-attribute
        var departmentId = button.data('department-id'); // Extract department_id from data-attribute
        var curriculumName = button.data('curriculum-name'); // Extract department_id from data-attribute
        var curriculumYear = button.data('year-semester-id'); // Extract department_id from data-attribute
        var description = button.data('description'); // Extract department_id from data-attribute
        var modal = $(this);
        modal.find('.modal-body #curriculum_id').val(curriculumId); // Set the department_id in the modal form
        modal.find('.modal-body #department-id').val(departmentId); // Set the department_id in the modal form
        modal.find('.modal-body #curriculum_name').val(curriculumName); // Set the department_id in the modal form
        modal.find('.modal-body #year_semester_id').val(curriculumYear); // Set the department_id in the modal form
        modal.find('.modal-body #description').val(description); // Set the department_id in the modal form
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
            window.location.href = 'delete_subject.php?subject_id=' + codeId + '&curriculum_id=<?= $_GET['id'] ?>';
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