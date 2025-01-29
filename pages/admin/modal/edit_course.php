<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from subject_tbl where subject_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Course</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->subject_id ?>">

  <div class="modal-body">
    <!-- <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Program:</label>
        <select name="program_id" id="program_id" class="form-control">
          <?php foreach (get_list("SELECT * from program_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['program_id'] ?>" <?= $row['program_id'] == $data->program_id ? "selected" : "" ?>><?= $row['program_code'] ?> (<?= $row['program_title'] ?>)</option>
          <?php } ?>
        </select>
      </div>
    </div> -->
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Class Type:</label>
        <select name="class_type_id" id="class_type_id" class="form-control">
          <?php foreach (get_list("SELECT * from class_type_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['class_type_id'] ?>" <?= $row['class_type_id'] == $data->class_type_id ? "selected" : "" ?>><?= $row['class_type_name'] ?> </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Course Code:</label>
        <input required type="text" class="form-control" id="subject_code" name="subject_code" required value="<?= $data->subject_code ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Course Name:</label>
        <input required type="text" class="form-control" id="subject_title" name="subject_title" required value="<?= $data->subject_title ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Unit:</label>
        <input required type="number" class="form-control" id="subject_unit" name="subject_unit" required value="<?= $data->subject_unit ?>">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>