<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from grade_range_tbl where grade_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Grade</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->grade_id ?>">
  <div class="modal-body">
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Grade Value:</label>
        <input required type="text" class="form-control" id="grade" name="grade" required value="<?= $data->grade ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Grade Description:</label>
        <input required type="text" class="form-control" id="description" name="description" required value="<?= $data->description ?>">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>