<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from curriculum_subjects_tbl where curriculum_subjects_id = " . $_GET['id']);
$data2 = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $data->curriculum_id);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Subject</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->curriculum_subjects_id ?>">
  <input type="hidden" name="curriculum_id" value="<?= $data2->curriculum_id ?>">

  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Year:</label>
        <select name="year_id" id="year_id" class="form-control">
          <?php foreach (get_list("SELECT * from year_levels_tbl  where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['year_id'] ?>" <?= $row['year_id'] == $data->year_id ? "selected" : "" ?>><?= $row['year_name'] ?> </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Semester:</label>
        <select name="semester_id" id="semester_id" class="form-control">
          <?php foreach (get_list("SELECT * from semester_tbl  where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['semester_id'] ?>" <?= $row['semester_id'] == $data->semester_id ? "selected" : "" ?>><?= $row['semester_name'] ?> </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Course:</label>
        <select name="subject_id" id="subject_id" class="form-control">
          <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data2->program_id) as $row) { ?>
            <option value="<?= $row['subject_id'] ?>" <?= $row['subject_id'] == $data->subject_id ? "selected" : "" ?>><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Co/Prerequisite:</label>
        <select name="pre_subject_id" id="pre_subject_id" class="form-control">
          <option value="0">NONE</option>
          <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data2->program_id) as $row) { ?>
            <option value="<?= $row['subject_id'] ?>" <?= $row['subject_id'] == $data->pre_subject_id ? "selected" : "" ?>><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>