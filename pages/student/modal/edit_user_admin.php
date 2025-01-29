<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from admin_tbl where admin_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Admin</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input required type="hidden" name="edit" value="1">
  <input required type="hidden" name="id" value="<?= $data->admin_id ?>">
  <input required type="hidden" name="default_img" value="<?= $data->admin_profile ?>">
  <input required type="hidden" name="default_pass" value="<?= $data->admin_password ?>">
  <div class="modal-body">
    <div class="form-group">
      <label for="department-course" class="font-weight-bold">Image:</label>
      <div class="custom-file">
        <input required type="file" class="custom-file-input required" id="admin_profile" name="admin_profile" accept="image/*">
        <label class="custom-file-label" for="admin_profile">Choose file</label>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="admin_firstname" class="font-weight-bold">First Name:</label>
        <input required type="text" class="form-control" id="admin_firstname" name="admin_firstname" value="<?= $data->admin_firstname ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="admin_lastname" class="font-weight-bold">Last Name:</label>
        <input required type="text" class="form-control" id="admin_lastname" name="admin_lastname" value="<?= $data->admin_lastname ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Role:</label>
        <select name="access_id" id="access_id" class="form-control">
          <?php foreach (get_list("SELECT * from access_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['access_id'] ?>" <?= $row['access_id'] == $data->access_id ? "selected" : "" ?>><?= $row['access_role'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Email:</label>
        <input required type="email" class="form-control" id="admin_email" name="admin_email" required value="<?= $data->admin_email ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Password:</label>
        <input required type="password" class="form-control" id="admin_password" name="admin_password">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>

</form>