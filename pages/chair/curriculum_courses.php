<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM curriculum_subjects_tbl where curriculum_subjects_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(curriculum_subjects_id) is null, 0, max(curriculum_subjects_id) + 1) as `res` from curriculum_subjects_tbl  where   curriculum_id = '$curriculum_id' and  subject_id = '$subject_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO curriculum_subjects_tbl (curriculum_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$curriculum_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      // $('#modal-create').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}

if (isset($_POST['edit'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(curriculum_subjects_id) is null, 0, max(curriculum_subjects_id) + 1) as `res` from curriculum_subjects_tbl  where (curriculum_id = '$curriculum_id' and  subject_id = '$subject_id' ) and curriculum_subjects_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE curriculum_subjects_tbl set curriculum_id = '$curriculum_id', subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where curriculum_subjects_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}

$data = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $_GET['id'])




?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">CURRICULUM <?= $data->program_code . " (" . $data->program_title . ") - S.Y. " . $data->curriculum_semester_year_from . " to " . $data->curriculum_semester_year_to ?></h1>
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

                <div class="card-tools">
                  <a class="btn btn-sm btn-primary" href="curriculum.php">
                    <i class="nav-icon fas fa-chevron-left"></i>
                    <i class="nav-icon fas fa-chevron-left"></i>
                  </a>
                  <button type="button" class="btn btn-sm btn-primary" data-toggle='modal' data-target='#modal-create'>
                    Add Subject
                  </button>
                </div>
              </div>
              <div class="col-md-6 text-right">
              </div>
            </div>
          </div>



          <!-- /.card-header -->

          <!-- /.card-body -->

        </div>
        <?php

        foreach (get_list("SELECT * from curriculum_subjects_tbl cd inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id where cd.curriculum_id = '" . $_GET['id'] . "' GROUP BY y.year_id,ss.semester_id ORDER BY y.year_id,ss.semester_id ") as $row) {

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
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody style="text-transform: uppercase;">
                  <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from curriculum_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.curriculum_id = '" . $_GET['id'] . "' AND y.year_id = '" . $row['year_id'] . "' AND ss.semester_id = '" . $row['semester_id'] . "' ORDER BY y.year_id,ss.semester_id ") as $row2) { ?>
                    <tr>
                      <td><?= $row2['subject_code'] ?></td>
                      <td><?= $row2['subject_title'] ?></td>
                      <td><?= $row2['class_type_name']  ?></td>
                      <td><?= $row2['subject_unit'] ?></td>
                      <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
                      <td>
                        <form method="POST">
                          <input required type="hidden" name="delete" value="<?= $row2['curriculum_subjects_id'] ?>">
                          <button type='button' class='btn btn-sm btn-warning button-edit' data-toggle="tooltip" title="Edit" data-id='<?= $row2['curriculum_subjects_id'] ?>' data-url='edit_curriculum_course'>
                            <i class='fas fa-edit' data-id='<?= $row2['curriculum_subjects_id'] ?>' data-url='edit_curriculum_course'></i>
                          </button>
                          <button type="submit" class='btn btn-sm btn-danger delete' data-toggle="tooltip" title="Delete">
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
    </div>
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
        <input required type="hidden" name="create" value="1">
        <input required type="hidden" name="curriculum_id" value="<?= $data->curriculum_id ?>">

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
                <?php foreach (
                  get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 
                and s.subject_id not in (select subject_id from curriculum_subjects_tbl where curriculum_id = " . $_GET['id'] . ")") as $row
                ) { ?>
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
                <?php foreach (
                  get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 
                and s.subject_id") as $row
                ) { ?>
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