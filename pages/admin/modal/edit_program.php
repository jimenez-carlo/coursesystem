<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from program_tbl where program_id = " . $_GET['id']);
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
  <input type="hidden" name="id" value="<?= $data->program_id ?>">

  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">College:</label>
        <select name="program_category_id" id="program_category_id" class="form-control">
          <?php foreach (get_list("SELECT * from program_category_btl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['program_category_id'] ?>" <?= $row['program_category_id'] == $data->program_category_id ? "selected" : "" ?>><?= $row['program_category_name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Department:</label>
        <select name="department_id" id="department_id" class="form-control">
          <?php foreach (get_list("SELECT * from department_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['department_id'] ?>" <?= $row['department_id'] == $data->department_id ? "selected" : "" ?>><?= $row['department_code'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Program Code:</label>
        <input required type="text" class="form-control" id="program_code" name="program_code" required value="<?= $data->program_code ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Program Name:</label>
        <input required type="text" class="form-control" id="program_title" name="program_title" required value="<?= $data->program_title ?>">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>