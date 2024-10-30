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
    color: #007bff; /* Change the color on hover, you can adjust this as needed */
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4"style="background-color: #01377D">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link"style="margin-left: -8%;">
      <img src="../../../dist/img/psu.png" alt="PSU Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"style="margin-left: -2%;">Course Evaluation System</span>
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
            <a href="/coursesystem/pages/admin/admin.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
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
                  <p>Subject</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/curriculum/curriculum.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Curriculum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/educational_program/pre-requisite/pre-resiquisite.php" class="nav-link">
                  <i class="nav-icon fas fa-file-signature"></i>
                  <p>Pre-Requisite</p>
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
                <a href="/coursesystem/pages/transaction/confirmation/confirmation.php" class="nav-link">
                  <i class="nav-icon fas fa-check-circle"></i>
                  <p>Confirmation</p>
                </a>
              </li>
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
                Process
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/coursesystem/pages/process/checklist/checklist.php" class="nav-link">
                  <i class="nav-icon fas fa-pen"></i>
                  <p>Checklist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/process/pds/pds.php" class="nav-link">
                  <i class="fas fa-book nav-icon"></i>
                  <p>PDS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/coursesystem/pages/process/student/student.php" class="nav-link">
                  <i class="fas fa-user"></i>
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
            <h1 style="font-weight: bold;">Checklist</h1>
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
                    <h4 class="modal-title">Student Details</h4>
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
            
            <th>Student Firstname</th>
            <th>Student Middlename</th>
            <th>Student Lastname</th>
            <th>Student Course</th>
            <th>Student Status</th>
            
          
    
        </tr>
    </thead>
    <tbody>
   
   <?php
// Include the conn.php file
include('../../../conn.php');

// Check if $conn is set and valid
if ($conn) {
    // Execute queries using $conn
    $sql = "SELECT * FROM checklistform_tbl";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<tr>
            <td>" . $row["student_firstname"] . "</td>
            <td>" . $row["student_middlename"] . "</td>
            <td>" . $row["student_lastname"] . "</td>
            <td>" . $row["student_course"] . "</td>
            <td>" . $row["student_status"] . "</td>
            
            <td>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' data-student-idno='" . $row['student_idno'] . ")'>
                    <i class='fas fa-edit'></i>
                </button>
                <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row['student_idno'] . ")'>
                    <i class='fas fa-trash'></i>
                </button>
            <td>";
                
        // Display button for Deactivate/Activate based on status
        if ($row["student_status"] == 'Active') {
            echo "<button class='btn btn-danger' onclick='deactivateUser(" . $row['student_idno'] . ")'>Deactivate</button>";
        } else {
            echo "<button class='btn btn-success' onclick='activateUser(" . $row['student_idno'] . ")'>Activate</button>";
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

<!-- Add Modal -->
<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addModal')">&times;</span>
        <h2>Add Student</h2>
        <div class="form-group">
            <label for="addFirstname">First Name</label>
            <input type="text" id="addFirstname">
        </div>
        <div class="form-group">
            <label for="addMiddlename">Middle Name</label>
            <input type="text" id="addMiddlename">
        </div>
        <div class="form-group">
            <label for="addLastname">Last Name</label>
            <input type="text" id="addLastname">
        </div>
        <div class="form-group">
            <label for="addCourse">Course</label>
            <select id="addCourse">
                <option value="ABEL">ABEL</option>
                <option value="BPA">BPA</option>
                <option value="BSBA">BSBA</option>
                <option value="BSIT">BSIT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="addStudentStatus">Student Status</label>
            <select id="addStudentStatus">
                <option value="REGULAR">REGULAR</option>
                <option value="IRREGULAR">IRREGULAR</option>
            </select>
        </div>
        <button onclick="submitForm('add')">Submit</button>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editModal')">&times;</span>
        <h2>Edit Student</h2>
        <div class="form-group">
            <label for="editFirstname">First Name</label>
            <input type="text" id="editFirstname">
        </div>
        <div class="form-group">
            <label for="editMiddlename">Middle Name</label>
            <input type="text" id="editMiddlename">
        </div>
        <div class="form-group">
            <label for="editLastname">Last Name</label>
            <input type="text" id="editLastname">
        </div>
        <div class="form-group">
            <label for="editCourse">Course</label>
            <select id="editCourse">
                <option value="ABEL">ABEL</option>
                <option value="BPA">BPA</option>
                <option value="BSBA">BSBA</option>
                <option value="BSIT">BSIT</option>
            </select>
        </div>
        <div class="form-group">
            <label for="editStudentStatus">Student Status</label>
            <select id="editStudentStatus">
                <option value="REGULAR">REGULAR</option>
                <option value="IRREGULAR">IRREGULAR</option>
            </select>
        </div>
        <button onclick="submitForm('edit')">Submit</button>
    </div>
</div>

<!-- Trigger Buttons -->
<button onclick="openModal('addModal')">Add Student</button>
<button onclick="openModal('editModal')">Edit Student</button>

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
<script src="..././../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../../dist/js/pages/dashboard.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

function submitForm(type) 
        if (type === 'add') {
            // Handle add form submission logic
            const firstname = document.getElementById('addFirstname').value;
            const middlename = document.getElementById('addMiddlename').value;
            const lastname = document.getElementById('addLastname').value;
            const course = document.getElementById('addCourse').value;
            const studentStatus = document.getElementById('addStudentStatus').value;
            console.log(`Adding student: ${firstname} ${middlename} ${lastname}, ${course}, ${studentStatus}`);
        } else if (type === 'edit') {
            // Handle edit form submission logic
            const firstname = document.getElementById('editFirstname').value;
            const middlename = document.getElementById('editMiddlename').value;
            const lastname = document.getElementById('editLastname').value;
            const course = document.getElementById('editCourse').value;
            const studentStatus = document.getElementById('editStudentStatus').value;
            console.log(`Editing student: ${firstname} ${middlename} ${lastname}, ${course}, ${studentStatus}`);
        }
        closeModal(`${type}Modal`);
  
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
          window.location.href = "logout.php";
        } else {
          swal("You're still logged in!");
        }
      });
    });
  }
});

function confirmDelete(studentId) {
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
                    window.location.href = 'delete_delete.php?student_id=' + studentId;
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

