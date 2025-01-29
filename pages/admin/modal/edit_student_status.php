<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from student_status_tbl where student_status_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Student Status</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->student_status_id ?>">
  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Student Status Name:</label>
        <input required type="text" class="form-control" id="student_status" name="student_status" required value="<?= $data->student_status ?>">
      </div>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>