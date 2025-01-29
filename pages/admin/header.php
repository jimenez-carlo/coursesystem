        <?php
        if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [1, 2])) {
        } else if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [3, 4])) {
          header("Location: ../../index.php");
        } else if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [5])) {
          header("Location: ../../index.php");
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

          <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
          <style>
            #addButton:hover {
              color: #007bff;
              /* Change the color on hover, you can adjust this as needed */
            }

            body {
              zoom: 98%;
            }

            .datatable {
              width: 100% !important;
            }

            .tooltip .arrow {
              display: none;
            }
          </style>
        </head>

        <body class="hold-transition sidebar-mini layout-fixed">
          <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
              <img class="animation__shake" src="../../dist/img/psu.png" alt="PSU Logo" height="200" width="200">
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
                <?php
                $name = get_one("select * from admin_tbl where admin_id = " . $_SESSION['user_id']);
                ?>
                <div class="info">
                  <a href="#" class="d-block"><?= $name->admin_firstname . " " . $name->admin_lastname ?></a>
                  <span style="color: white"> <?= get_one("select * from access_tbl where access_id = " . $_SESSION['user_access_id'])->access_role ?> </span>
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
              <?php include_once('menu.php') ?>
              <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
          </aside>
          <div class="content-wrapper">