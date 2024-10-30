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
      <img src="dist/img/psu.png" alt="PSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="../../final_index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../department/department.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../admin/admin.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
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
            <ul class="nav nav">
            <li class="nav-item">
                <a href="../educational_program/course/course.php" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Course</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../educational_program/curriculum/curriculum.php" class="nav-link">
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
                  <i class="nav-icon fas fa-exclamation"></i>
                  <p>Evaluated</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="../user/user.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../student/student.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Students
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout/logout.php" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
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
            <h1>User</h1>
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
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search" type="text" id="searchQuery" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
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
                <div class="modal-body" id="userDetails">
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
        <td><img src='data:image/jpeg;base64," . base64_encode($row["user_picture"]) . "' alt='User Picture' style='max-width: 50px; max-height: 50px;'></td> 
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Password</th>
            <td><img src='data:image/base64," . base64_encode($row["user_idpicture"]) . "' alt='User IdPicture' style='max-width: 50px; max-height: 50px;'></td>
            <th>User Profile</th>
    
        </tr>
    </thead>
    <tbody>
<?php
include('../../conn.php');

// Fetch data from department_tbl
$sql = "SELECT * FROM user_tbl";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td><img src='data:image/jpeg;base64," . base64_encode($row["user_picture"]) . "' alt='User Picture' style='max-width: 50px; max-height: 50px;'></td>
                <td>" . $row["user_firstname"] . "</td> 
                <td>" . $row["user_middlename"] . "</td>
                <td>" . $row["user_lastname"] . "</td>
                <td>" . $row["user_age"] . "</td>
                <td>" . $row["user_gender"] . "</td>
                <td>" . $row["user_mobile"] . "</td> 
                <td>" . $row["user_email"] . $row["user_profile"] . "</td>
                <td><img src='data:image/jpeg;base64," . base64_encode($row["user_idpicture"]) . "' alt='User IdPicture' style='max-width: 50px; max-height: 50px;'></td>
                <td>" . $row["user_account_status"] . "</td>
                
                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' onclick='openEditModal(" . $row['user_id'] . ")'>Edit</button></td>";

        // Display button for Deactivate/Activate based on status
        echo "<td>";
        if ($row["user_account_status"] == 'Active') {
            echo "<button class='btn btn-danger' onclick='deactivateUser(" . $row['user_id'] . ")'>Deactivate</button>";
        } else {
            echo "<button class='btn btn-success' onclick='activateUser(" . $row['user_id'] . ")'>Activate</button>";
        }
        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='8'>No data found</td></tr>";
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

   <!-- ADD USER MODAL -->
   <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="add_user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="int" name="user_id" hidden/>
                    User Firstname: <input type="text" name="user_firstname" /><br/><br/>
                    User Middlename: <input type="text" name="user_middlename" /><br/><br/>
                    User Lastname: <input type="text" name="user_lastname" /><br/><br/>
                    User Age: <input type="number" name="user_age" /><br/><br/>
                    User Gender: <input type="enum" name="user_gender" /><br/><br/>
                    User Mobile: <input type="number" name="user_mobile" /><br/><br/>
                    User Email: <input type="text" name="user_email" /><br/><br/>
                    User Password: <input type="text" name="user_password" /><br/><br/>
                    User Profile: <input type="file" name="user_profile" accept="image"/><br/><br/>
                   

                </div>
                <div class="modal-footer justify-content-between">
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
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="edituser.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    User Firstname: <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" /><br/>
                    User Middlename: <input type="text" name="user_middlename" value="<?php echo $user_middlename; ?>" /><br/>
                    User Lastname: <input type="number" name="user_lastname" value="<?php echo $user_lastname; ?>" /><br/>
                    User Age: <input type="text" name="user_streetname" value="<?php echo $user_age; ?>" /><br/>
                    User Gender: <input type="text" name="user_age" value="<?php echo $user_gender; ?>" /><br/>
                    User Mobile: <input type="text" name="user_gender" value="<?php echo $user_mobile; ?>" /><br/>
                    User Email: <input type="number" name="user_mobilenumber" value="<?php echo $user_email; ?>" /><br/>
                    User Password: <input type="number" name="user_birthday" value="<?php echo $user_password; ?>" /><br/>
                    User Profile: <input type="number" name="user_birthmonth"accept="image/*" value="<?php echo $user_profile; ?>" /><br/>
                   
                   
                    Status:
                    <select name="user_account_status">
                        <option value="Active" <?php if ($user_account_status == 'Active') echo "selected"; ?>>Activate</option>
                        <option value="Deactivated" <?php if ($user_account_status == 'Deactivated') echo "selected"; ?>>Deactivate</option>
                    </select><br/>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

<script>



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

