<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['change_status'])) {
  extract($_POST);
  query("UPDATE studen_file_tbl set evaluation_status_id = '$evaluation_status_id'  where studen_file_id = " . $change_status);
  echo message_success("Changed Status!");
}
if (isset($_POST['update_feedback'])) {
  extract($_POST);
  query("UPDATE studen_file_tbl set feedback = '$feedback'  where studen_file_id = " . $id);
  echo message_success("Updated Feedback!");
}

if (isset($_POST['delete_recommended_subject'])) {
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['delete_recommendation'])) {
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete_recommendation']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['delete'])) {
  query("DELETE FROM student_subjects_tbl where student_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['grade'])) {
  extract($_POST);
  query("UPDATE student_subjects_tbl set grade_id = '$grade_id'  where student_subject_id = " . $_POST['grade']);
  echo message_success("Updated Successfully!");
}

if (isset($_POST['create_recommendation'])) {
  extract($_POST);
  $check_exists = get_one("SELECT if(max(recommended_subject_id) is null, 0, max(recommended_subject_id) + 1) as `res` from recommended_subjects_tbl  where   student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$student_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      $('#modal-create-recommendation').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}
if (isset($_POST['create'])) {
  extract($_POST);
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from student_subjects_tbl  where   student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$student_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      $('#modal-create').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}

if (isset($_POST['edit'])) {
  extract($_POST);
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from student_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_subject_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE student_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where student_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}

if (isset($_POST['edit_recommendation'])) {
  extract($_POST);
  $check_exists = get_one("SELECT if(max(recommended_subject_id) is null, 0, max(recommended_subject_id) + 1) as `res` from recommended_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_id <> $student_id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE recommended_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where recommended_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}
$student_data = get_one("SELECT * from student_tbl where student_id = " . $_GET['id']);
$data = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $student_data->curriculum_id)




?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 style="font-weight: bold;text-transform:uppercase"><?= $student_data->student_lastname . ", " . $student_data->student_firstname ?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="col-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">DETAILS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">IER</a>
            </li>

          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-md-11" style="font-weight:bold">
                          RECOMMENDATION'S
                        </div>
                        <div class="col-md-1 text-right">
                          <div class="card-tools">
                            <a class="btn btn-sm btn-default" href="curriculum_students.php?id=<?= $data->curriculum_id ?>">
                              <i class="nav-icon fas fa-backward"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-default" data-toggle='modal' data-target='#modal-create-recommendation'>
                              <i class="nav-icon fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>



                    <!-- /.card-header -->

                    <!-- /.card-body -->

                  </div>

                  <div class="card mt-5 mb-5 ">
                    <div class="card-header primary" style="font-weight:bold">SUBJECTS</div>
                    <div class="card-body table-responsive p-3">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Course Code</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Unit</th>
                            <th>Co/Prerequisite</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody style="text-transform: uppercase;">
                          <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from recommended_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.student_id = '" .  $student_data->student_id . "' AND y.year_id = '" . $student_data->year_id . "' AND ss.semester_id = '" . $student_data->semester_id . "' ORDER BY y.year_id,ss.semester_id") as $row2) { ?>
                            <tr>

                              <td><?= $row2['subject_code'] ?></td>
                              <td><?= $row2['subject_title'] ?></td>
                              <td><?= $row2['class_type_name']  ?></td>
                              <td><?= $row2['subject_unit'] ?></td>
                              <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
                              <td>
                                <form method="POST">
                                  <input type="hidden" name="delete_recommendation" value="<?= $row2['recommended_subject_id'] ?>">
                                  <button type='button' class='btn btn-sm btn-warning button-edit' data-id='<?= $row2['recommended_subject_id'] ?>' data-url='edit_student_recommendation'>
                                    <i class='fas fa-edit' data-id='<?= $row2['recommended_subject_id'] ?>' data-url='edit_student_recommendation'></i>
                                  </button>
                                  <button type="submit" class='btn btn-sm btn-danger delete'>
                                    <i class='fas fa-trash'></i>
                                  </button>
                                </form>
                              </td>
                            </tr>
                          <?php }  ?>
                        </tbody>
                      </table>

                    </div>
                  </div>



                  <!-- /.card -->
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="row align-items-center">
                        <div class="col-md-11" style="font-weight:bold">
                          STUDENT SUBJECTS
                        </div>
                        <div class="col-md-1 text-right">
                          <div class="card-tools">

                            <button type="button" class="btn btn-sm btn-default" data-toggle='modal' data-target='#modal-create'>
                              <i class="nav-icon fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>



                    <!-- /.card-header -->

                    <!-- /.card-body -->

                  </div>
                  <?php

                  foreach (get_list("SELECT * from student_subjects_tbl cd inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id where cd.student_id = '" . $_GET['id'] . "' GROUP BY y.year_id,ss.semester_id ORDER BY y.year_id,ss.semester_id ") as $row) {

                  ?>
                    <div class="card mt-5 mb-5 ">
                      <div class="card-header" style="font-weight:bold"><?= $row['year_name'] ?> <span style="float:right"> <?= $row['semester_name'] ?></span></div>
                      <div class="card-body table-responsive p-3">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th style="min-width: 160px;">Grade</th>
                              <th>Course Code</th>
                              <th>Description</th>
                              <th>Type</th>
                              <th>Unit</th>
                              <th>Co/Prerequisite</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody style="text-transform: uppercase;">
                            <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from student_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.student_id = '" . $_GET['id'] . "' AND y.year_id = '" . $row['year_id'] . "' AND ss.semester_id = '" . $row['semester_id'] . "' ORDER BY y.year_id,ss.semester_id ") as $row2) { ?>
                              <tr>
                                <td style="min-width: 160px;">
                                  <form method="POST">
                                    <input type="hidden" name="grade" value="<?= $row2['student_subject_id'] ?>">

                                    <div class="input-group input-group">
                                      <select name="grade_id" id="grade_id" class="form-control">

                                        <?php foreach (get_list("SELECT * from grade_range_tbl  where deleted_flag = 0") as $row) { ?>
                                          <option value="<?= $row['grade_id'] ?>" <?= $row['grade_id'] == $row2['grade_id'] ? "selected" : "" ?>><?= $row['grade'] ?> </option>
                                        <?php } ?>
                                      </select>
                                      <span class="input-group-append">
                                        <button type="submit" class="btn btn-success btn-flat btn-sm" style="min-height: 100%"> <i class='fas fa-save'></i></button>
                                      </span>
                                    </div>


                                  </form>
                                </td>
                                <td><?= $row2['subject_code'] ?></td>
                                <td><?= $row2['subject_title'] ?></td>
                                <td><?= $row2['class_type_name']  ?></td>
                                <td><?= $row2['subject_unit'] ?></td>
                                <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
                                <td>
                                  <form method="POST">
                                    <input type="hidden" name="delete" value="<?= $row2['student_subject_id'] ?>">
                                    <button type='button' class='btn btn-sm btn-warning button-edit' data-id='<?= $row2['student_subject_id'] ?>' data-url='edit_student_course'>
                                      <i class='fas fa-edit' data-id='<?= $row2['student_subject_id'] ?>' data-url='edit_student_course'></i>
                                    </button>
                                    <button type="submit" class='btn btn-sm btn-danger delete'>
                                      <i class='fas fa-trash'></i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            <?php }  ?>
                          </tbody>
                        </table>

                      </div>
                    </div>


                  <?php
                  }
                  ?>
                  <!-- /.card -->
                </div>
                <div class="col-6" style="display:none">
                  <div class="card">
                    <div class="card-header" style="min-height:48px">
                      <div class="row align-items-center">
                        <div class="col-md-12" style="font-weight: bold;">
                          CURRICULUM CHECKLIST <?= $data->program_code . "( S.Y. " . $data->curriculum_semester_year_from . " to " . $data->curriculum_semester_year_to . ")" ?>
                        </div>

                      </div>
                    </div>



                    <!-- /.card-header -->

                    <!-- /.card-body -->

                  </div>
                  <?php

                  foreach (get_list("SELECT * from curriculum_subjects_tbl cd inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id where cd.curriculum_id = '" . $student_data->curriculum_id . "' GROUP BY y.year_id,ss.semester_id ORDER BY y.year_id,ss.semester_id ") as $row) {

                  ?>
                    <div class="card mt-5 mb-5 ">
                      <div class="card-header" style="font-weight:bold"><?= $row['year_name'] ?> <span style="float:right"> <?= $row['semester_name'] ?></span></div>
                      <div class="card-body table-responsive p-3">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>Course Code</th>
                              <th>Description</th>
                              <th>Type</th>
                              <th>Unit</th>
                              <th>Co/Prerequisite</th>
                            </tr>
                          </thead>
                          <tbody style="text-transform: uppercase;">
                            <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from curriculum_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.curriculum_id = '" . $student_data->curriculum_id . "' AND y.year_id = '" . $row['year_id'] . "' AND ss.semester_id = '" . $row['semester_id'] . "' ORDER BY y.year_id,ss.semester_id ") as $row2) { ?>
                              <tr style="min-height:62.5px!important">
                                <td style="min-height:62.5px!important;height:62.5px;"><?= $row2['subject_code'] ?></td>
                                <td style="min-height:62.5px!important;height:62.5px;"><?= $row2['subject_title'] ?></td>
                                <td style="min-height:62.5px!important;height:62.5px;"><?= $row2['class_type_name']  ?></td>
                                <td style="min-height:62.5px!important;height:62.5px;"><?= $row2['subject_unit'] ?></td>
                                <td style="min-height:62.5px!important;height:62.5px;"><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>

                              </tr>
                            <?php }  ?>
                          </tbody>
                        </table>

                      </div>
                    </div>


                  <?php
                  }
                  ?>
                  <!-- /.card -->
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

              <div class="card-body table-responsive p-3">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Actions</th>
                      <th>Status</th>
                      <th>Feedback</th>
                    </tr>
                  </thead>
                  <tbody style="text-transform: uppercase;">
                    <?php foreach (get_list("SELECT * from studen_file_tbl f inner join evaluation_status_tbl es on es.evaluation_status_id = f.evaluation_status_id left join semester_tbl s on s.semester_id = f.semester_id left join  year_levels_tbl y on y.year_id = f.year_id where f.student_id = " . $student_data->student_id) as $row2) { ?>
                      <tr>
                        <td>
                          <a href="<?= $row2['file_name'] ?>" target="_blank" class="btn btn-sm btn-primary"><i class='fas fa-eye'></i></a>
                          <a href="<?= $row2['file_name'] ?>" download class="btn btn-sm btn-primary"><i class='fas fa-download'></i></a>
                        </td>
                        <td>
                          <!-- <?= $row2['evaluation_status'] ?> -->
                          <form method="POST">

                            <div class="input-group input-group">
                              <input type="hidden" name="change_status" value="<?= $row2['studen_file_id'] ?>">
                              <select name="evaluation_status_id" id="evaluation_status_id" class="form-control">

                                <?php foreach (get_list("SELECT * from evaluation_status_tbl  where deleted_flag = 0") as $row) { ?>
                                  <option value="<?= $row['evaluation_status_id'] ?>" <?= $row['evaluation_status_id'] == $row2['evaluation_status_id'] ? "selected" : "" ?>><?= $row['evaluation_status'] ?> </option>
                                <?php } ?>
                              </select>
                              <button type="submit" class="btn btn-primary btn-flat btn-sm"> <i class='fas fa-save'></i></button>
                            </div>


                          </form>
                        </td>
                        <td>
                          <form method="POST">

                            <div class="input-group input-group">

                              <input type="hidden" name="update_feedback" value="1">
                              <input type="hidden" name="id" value="<?= $row2['studen_file_id'] ?>">
                              <textarea name="feedback" id="" class="form-control"><?= $row2['feedback'] ?></textarea>
                              <button type="submit" class="btn btn-primary btn-flat btn-sm">Save</button>
                            </div>


                          </form>
                        </td>

                      </tr>
                    <?php }  ?>
                  </tbody>
                </table>

              </div>

            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-add-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-create-content">
      <div class="modal-header bg-primary text-white">
        <div class="row w-100 justify-content-between align-items-center">
          <div class="col">
            <h4 class="modal-title" id="modal-add-title">Add Subject</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="create" value="1">
        <input type="hidden" name="student_id" value="<?= $_GET['id'] ?>">

        <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Year:</label>
              <select name="year_id" id="year_id" class="form-control">
                <?php foreach (get_list("SELECT * from year_levels_tbl  where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['year_id'] ?>"><?= $row['year_name'] ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Semester:</label>
              <select name="semester_id" id="semester_id" class="form-control">
                <?php foreach (get_list("SELECT * from semester_tbl  where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['semester_id'] ?>"><?= $row['semester_name'] ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course:</label>
              <select name="subject_id" id="subject_id" class="form-control">
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Co/Prerequisite:</label>
              <select name="pre_subject_id" id="pre_subject_id" class="form-control">
                <option value="0">NONE</option>
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-create-recommendation" tabindex="-1" role="dialog" aria-labelledby="modal-add-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-create-content">
      <div class="modal-header bg-primary text-white">
        <div class="row w-100 justify-content-between align-items-center">
          <div class="col">
            <h4 class="modal-title" id="modal-add-title">Add Subject</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="create_recommendation" value="1">
        <input type="hidden" name="student_id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="year_id" value="<?= $student_data->year_id ?>">
        <input type="hidden" name="semester_id" value="<?= $student_data->semester_id ?>">

        <div class="modal-body">


          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course:</label>
              <select name="subject_id" id="subject_id" class="form-control">
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Co/Prerequisite:</label>
              <select name="pre_subject_id" id="pre_subject_id" class="form-control">
                <option value="0">NONE</option>
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal-dialog -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-edit-content">

    </div>
  </div>
</div>

<?php
include_once('footer.php');

?>