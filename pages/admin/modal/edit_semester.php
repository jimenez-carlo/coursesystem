<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from semester_tbl where semester_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Semester</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->department_id ?>">
  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Semester Name:</label>
        <input type="text" class="form-control" id="semester_name" name="semester_name" required value="<?= $data->semester_name ?>">
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>