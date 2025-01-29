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

  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../dist/img/psu.png" alt="PSU logo" height="200" width="200">
    </div>

    <!-- Navbr -->
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
          <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="display:none">
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
        <img src="../../dist/img/psu.png" alt="PSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="margin-left: -2%;">Course Evaluation System</span>
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
              <input required type="file" name="profile_image" id="uploadProfile" accept="image/*">
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
            <a href="/coursesystem/pages/admin/admin.php" class="nav-link active">
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
                <a href="/coursesystem/pages/educational_program/curriculum/curriculum.php" class="nav-link">
                  <i class="nav-icon fas fa-book "></i>
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
                <a href="/coursesystem/pages/student/student.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Student</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/coursesystem/pages/logout/logout.php" class="nav-link logoutLink">
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
            <h1 style="font-weight: bold;">MANAGE ADMIN</h1>
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
                    <div class="input required-group input required-group-sm" style="width: 150px;">

                      <!-- Modal to display admin details -->
                      <div class="modal" id="adminModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Admin Details</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body" id="adminDetails">
                              <!-- Admin details will be displayed here -->
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
                      <th>Admin Profile</th>
                      <th>Username</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Position</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include("../../conn.php");

                    // Fetch data from admin_tbl
                    $sql = "SELECT * FROM admin_tbl";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      // Output data of each row
                      while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                <td><img src='" . htmlspecialchars($row["admin_profile"]) . "' alt='Admin Profile' style='max-width: 50px; max-height: 50px;'></td>
                <td>" . htmlspecialchars($row["admin_email"]) . "</td> 
                <td>" . htmlspecialchars($row["admin_firstname"]) . "</td>
                <td>" . htmlspecialchars($row["admin_lastname"]) . "</td>
                <td>" . htmlspecialchars($row["admin_position"]) . "</td>
                <td>" . htmlspecialchars($row["admin_status"]) . "</td>
                <td>
    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' data-admin-id='" . $row['admin_id'] . ")'>
        <i class='fas fa-edit'></i>
    </button>
    <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row['admin_id'] . ")'>
        <i class='fas fa-trash'></i>
    </button>
</td>";

                        // Separate cell for the Activate/Deactivate button
                        echo "<td>";
                        if ($row["admin_status"] == 'Active') {
                          echo "<button class='btn btn-success' onclick='deactivateAdmin(" . $row['admin_id'] . ")'>Active</button>";
                        } else {
                          echo "<button class='btn btn-danger' onclick='activateAdmin(" . $row['admin_id'] . ")'>Deactivated</button>";
                        }
                        echo "</td></tr>";
                      }
                    } else {
                      echo "<tr><td colspan='9'>No data found</td></tr>";
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

  <!-- ADD ADMIN MODAL -->
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h4 class="modal-title" style="font-weight: bold;">Add Admin</h4>
        </div>
        <div class="modal-body">
          <form action="add_admin.php" method="POST" enctype="multipart/form-data">
            <input required type="int" name="admin_id" hidden>
            <input required type="enum" name="admin_status" hidden>
            <div class="form-group">
              <label for="admin_profile">Admin Profile:</label>
              <div class="custom-file">
                <input required type="file" class="custom-file-input required" id="admin_profile" name="admin_profile" accept="image/*">
                <label class="custom-file-label" for="admin_profile">Choose file</label>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="admin_firstname" class="font-weight-bold">First Name:</label>
                    <input required type="text" class="form-control" id="admin_firstname" name="admin_firstname">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="admin_lastname" class="font-weight-bold">Last Name:</label>
                    <input required type="text" class="form-control" id="admin_lastname" name="admin_lastname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="admin_email" class="font-weight-bold">Username:</label>
                  <input required type="email" class="form-control" id="admin_email" name="admin_email">
                </div>
                <div class="form-group">
                  <label for="admin_password" class="font-weight-bold">Password:</label>
                  <input required type="password" class="form-control" id="admin_password" name="admin_password">
                </div>
                <div class="form-group">
                  <label for="admin_position" class="font-weight-bold">Position:</label>
                  <select class="form-control" id="admin_position" name="admin_position" required>
                    <option value="">Select Position</option>
                    <option value="Registrar">Registrar</option>
                    <option value="Dept Chair">Dept Chair</option>
                    <option value="Faculty">Faculty</option>
                  </select>
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
  </div>




  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- EDIT ADMIN MODAL -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #007bff; color: #fff;">
          <h4 class="modal-title" style="font-weight: bold;">Edit Admin</h4>
        </div>
        <div class="modal-body">
          <form action="edit_admin.php" method="POST" enctype="multipart/form-data">
            <input required type="hidden" id="admin_id" name="admin_id">

            <div class="form-group">
              <label for="admin_profile">Admin Profile:</label>
              <div class="custom-file">
                <input required type="file" class="custom-file-input required" id="admin_profile" name="admin_profile" accept="image/*">
                <label class="custom-file-label" for="admin_profile">Choose file</label>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="admin_firstname" class="font-weight-bold">First Name:</label>
                  <input required type="text" class="form-control" id="admin_firstname" name="admin_firstname">
                </div>
                <div class="form-group col-md-6">
                  <label for="admin_lastname" class="font-weight-bold">Last Name:</label>
                  <input required type="text" class="form-control" id="admin_lastname" name="admin_lastname">
                </div>
              </div>
              <div class="form-group">
                <label for="admin_email" class="font-weight-bold">Username:</label>
                <input required type="email" class="form-control" id="admin_email" name="admin_email">
              </div>

              <div class="form-group">
                <label for="admin_" class="font-weight-bold">Password:</label>
                <input required type="password" class="form-control" id="admin_password" name="admin_password">
              </div>
              <div class="form-group">
                <label for="admin_position" class="font-weight-bold">Position:</label>
                <select class="form-control" id="admin_position" name="admin_position" required>
                  <option value="">Select Position</option>
                  <option value="Registrar">Registrar</option>
                  <option value="Dept Chair">Dept Chair</option>
                  <option value="Faculty">Faculty</option>
                </select>
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

    function confirmDelete(adminId) {
      swal({
        title: "Are you sure you want to delete this account?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          // You can add the success message here after deletion if needed
          swal("Poof! Admin has been deleted!", {
            icon: "success",
          }).then(() => {
            // Redirect to the delete script with the user ID
            window.location.href = 'delete_admin.php?admin_id=' + adminId;
          });
        } else {
          swal("Admin is safe!");
          // If canceling deletion, you might not need to perform any action here

        }
      });
    }



    // Script to handle opening the edit modal and passing the department_id
    $(document).ready(function() {
      $('#modal-edit').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var adminId = button.data('admin-id'); // Extract department_id from data-attribute
        var modal = $(this);
        modal.find('.modal-body #admin_id').val(adminId); // Set the department_id in the modal form
      });
    });

    function deactivateAdmin(adminId) {
      // Implement your deactivate logic, e.g., update user_account_status to 'Deactivated'
      if (confirm("Are you sure you want to deactivate this admin?")) {
        // Make an AJAX request or redirect to a PHP script to handle deactivation
        window.location.href = 'deactivate_admin.php?id=' + adminId;
      }
    }

    function activateAdmin(adminId) {
      // Implement your activate logic, e.g., update user_account_status to 'Active'
      if (confirm("Are you sure you want to activate this admin?")) {
        // Make an AJAX request or redirect to a PHP script to handle activation
        window.location.href = 'activate_admin.php?id=' + adminId;
      }
    }



    // Handle input required change and fetch suggestions
    $(document).ready(function() {
      $('#searchQuery').on('input required', function() {
        var searchQuery = $(this).val();
        if (searchQuery.length >= 1) {
          $.ajax({
            type: 'POST',
            url: 'get_live_search_results_admin.php', // PHP file to handle the AJAX request
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
        var adminEmail = $(this).text();
        // Open the modal
        $('#adminModal').modal('show');
        // Fetch and display admin details in the modal
        $.ajax({
          type: 'POST',
          url: 'get_admin_details.php', // PHP file to handle the AJAX request
          data: {
            adminEmail: adminEmail
          },
          success: function(response) {
            $('#adminDetails').html(response);
          }
        });
      });
    });
  </script>
  </script>
  </script>
</body>

</html>