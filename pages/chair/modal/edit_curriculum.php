<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from curriculum_tbl where curriculum_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Program</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->curriculum_id ?>">

  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Program:</label>
        <select name="program_id" id="program_id" class="form-control">
          <?php foreach (get_list("SELECT * from program_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['program_id'] ?>" <?= $row['program_id'] == $data->program_id ? "selected" : "" ?>><?= $row['program_code'] ?> (<?= $row['program_title'] ?>)</option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">S.Y.:</label>
        <select name="curriculum_semester_id" id="curriculum_semester_id" class="form-control">
          <?php foreach (get_list("SELECT * from curriculum_semester_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['curriculum_semester_id'] ?>" <?= $row['curriculum_semester_id'] == $data->curriculum_semester_id ? "selected" : "" ?>><?= $row['curriculum_semester_year_from'] ?> to <?= $row['curriculum_semester_year_to'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Curriculum title:</label>
        <input type="text" class="form-control" id="curriculum_title" name="curriculum_title" required value="<?= $data->curriculum_title ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Curriculum Description:</label>
        <textarea name="curriculum_description" id="curriculum_description" row="6" class="form-control"><?= $data->curriculum_description ?></textarea>
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>