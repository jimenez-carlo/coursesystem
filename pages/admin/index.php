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
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= get_one("SELECT COUNT(*) AS total_subject FROM subject_tbl")->total_subject ?? 0 ?></h3>
            <p>TOTAL SUBJECTS</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= get_one("SELECT COUNT(*) AS total_students FROM subject_tbl")->total_students ?? 0 ?></h3>
            <p>TOTAL STUDENTS</p>
          </div>
          <div class="icon">
            <i class="ion-ios-people"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= get_one("SELECT COUNT(*) AS total_curriculum FROM curriculum_tbl")->total_curriculum ?? 0 ?></h3>
            <p>Total Curriculum</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= get_one("SELECT COUNT(*) AS total_departments FROM department_tbl")->total_departments ?? 0 ?></h3>
            <p>Total Departments</p>
          </div>
          <div class="icon">
            <i class="ion-navicon"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</div><!-- /.container-fluid -->
</section>
<?php include_once('footer.php') ?>