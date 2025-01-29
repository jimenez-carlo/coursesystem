<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">DASHBOARD</h1 style>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <a href="index.php?display=subjects">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= get_one("SELECT COUNT(*) AS total_subject FROM subject_tbl")->total_subject ?? 0 ?></h3>
              <p>TOTAL SUBJECTS</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-6">
        <a href="index.php?display=students">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= get_one("SELECT COUNT(*) AS total_students FROM student_tbl")->total_students ?? 0 ?></h3>
              <p>TOTAL STUDENTS</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-6">
        <a href="index.php?display=curriculums">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= get_one("SELECT COUNT(*) AS total_curriculum FROM curriculum_tbl")->total_curriculum ?? 0 ?></h3>
              <p>Total Curriculum</p>
            </div>
            <div class="icon">
              <i class="fas fa-book-reader"></i>
            </div>
          </div>
        </a>
      </div>

      <div class="col-lg-3 col-6">
        <a href="index.php?display=departments">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= get_one("SELECT COUNT(*) AS total_departments FROM department_tbl")->total_departments ?? 0 ?></h3>
              <p>Total Departments</p>
            </div>
            <div class="icon">
              <i class="fas fa-city"></i>
            </div>
          </div>
        </a>
      </div>


      <?php if (isset($_GET['display']) && $_GET['display'] == "students") { ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="card-tools">

                  </div>
                </div>
                <div class="col-md-6 text-right">

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <table class="table table-hover text-nowrap datatable">
                <thead>
                  <tr>
                    <th>Img</th>
                    <th>Type</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Mobile#</th>

                  </tr>
                </thead>
                <tbody style="text-transform: uppercase;">
                  <?php foreach (get_list("SELECT a.*,s.student_status,g.gender from student_tbl a inner join student_status_tbl s  on s.student_status_id = a.student_status_id inner join gender_tbl g on g.gender_id = a.gender_id") as $row) { ?>
                    <tr>
                      <td><img src="<?= $row['student_profile'] ?>" class="img-circle elevation-2" alt="User Image" width="33" height="33"></td>
                      <td><?= $row['student_status'] ?></td>
                      <td><?= $row['student_firstname'] . " " . $row['student_middlename'] . "" . $row['student_lastname']  ?></td>
                      <td><?= $row['gender'] ?></td>
                      <td><?= $row['student_email'] ?></td>
                      <td><?= $row['student_mobile'] ?></td>

                    </tr>
                  <?php }  ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <?php } ?>
      <?php if (isset($_GET['display']) && $_GET['display'] == "curriculums") { ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="card-tools">

                  </div>
                </div>
                <div class="col-md-6 text-right">

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <table class="table table-hover text-nowrap datatable">
                <thead>
                  <tr>
                    <th>Program</th>
                    <th>S.Y.</th>
                    <th>Curriculum Code</th>
                    <th>Curriculum Description</th>

                  </tr>
                </thead>
                <tbody style="text-transform: uppercase;">
                  <?php foreach (get_list("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id") as $row) { ?>
                    <tr>
                      <td><?= $row['program_code'] . " (" . $row['program_title'] . ")" ?></td>
                      <td><?= $row['curriculum_semester_year_from'] ?> - <?= $row['curriculum_semester_year_to'] ?></td>
                      <td><?= $row['curriculum_title']  ?></td>
                      <td><?= $row['curriculum_description'] ?></td>

                    </tr>
                  <?php }  ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <?php } ?>
      <?php if (isset($_GET['display']) && $_GET['display'] == "departments") { ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="card-tools">

                  </div>

                </div>
                <div class="col-md-6 text-right">
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <table class="table table-hover text-nowrap datatable" style="text-transform: uppercase;">
                <thead>
                  <tr>
                    <th>Department Code</th>
                    <th>Department Name</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach (get_list("SELECT * from department_tbl") as $row) { ?>
                    <tr>
                      <td><?= $row['department_code'] ?></td>
                      <td><?= $row['department_title'] ?></td>

                    </tr>
                  <?php }  ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <?php } ?>
      <?php if (isset($_GET['display']) && $_GET['display'] == "subjects") { ?>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="card-tools">

                  </div>
                </div>
                <div class="col-md-6 text-right">

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-3">
              <table class="table table-hover text-nowrap datatable">
                <thead>
                  <tr>
                    <!-- <th>Program</th> -->
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Unit</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody style="text-transform: uppercase;">
                  <?php foreach (get_list("SELECT p.*,c.*,s.* from subject_tbl s left join program_tbl p on p.program_id = s.program_id inner join class_type_tbl c on s.class_type_id = c.class_type_id") as $row) { ?>
                    <tr>
                      <!-- <td><?= $row['program_code'] . " (" . $row['program_title'] . ")" ?></td> -->
                      <td><?= $row['subject_code']  ?></td>
                      <td><?= $row['subject_title'] ?></td>
                      <td><?= $row['subject_unit'] ?></td>
                      <td><?= $row['class_type_name'] ?></td>


                    </tr>
                  <?php }  ?>
                </tbody>
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      <?php } ?>
    </div>
  </div>
</section>
</div>
</div><!-- /.container-fluid -->
</section>
<?php include_once('footer.php') ?>