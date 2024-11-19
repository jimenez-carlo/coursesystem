        <?php
        if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [1, 2, 4])) {
          header("Location: ../../index.php");
        } else if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [3])) {
        } else if (isset($_SESSION['user_access_id']) && in_array($_SESSION['user_access_id'], [5])) {
          header("Location: ../../index.php");
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Students</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
          <link rel="stylesheet" href="../../css/recommendation.css">
          <link rel="stylesheet" href="../../css/chair_students.css">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
          <link rel="stylesheet" href="dist/css/adminlte.min.css">
          <!-- overlayScrollbars -->
          <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
          <!-- Daterange picker -->
          <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
          <!-- summernote -->
          <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">

          <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        </head>
        <style>
          #DataTables_Table_0_length,
          #DataTables_Table_0_info,
          #DataTables_Table_0_paginate {
            padding: 0px 17em;
          }

          #DataTables_Table_0_filter {

            padding: 0px 16em;
          }
        </style>

        <body>
          <header class="header">
            <a href="#" class="logo">
              <img src="../../main/img/psu_logo.png" alt="PSU Logo" style="height: 50px;">
              <span class="logo-text">Pangasinan State University</span>
            </a>

            <?php include_once('menu.php') ?>
          </header>
          <main>