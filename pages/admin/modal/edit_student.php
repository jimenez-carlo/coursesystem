<?php
include_once('../../../conn.php');
include_once('../../../functions.php');
$data = get_one("select * from student_tbl where student_id = " . $_GET['id']);
?>
<div class="modal-header bg-primary text-white">
  <div class="row w-100 justify-content-between align-items-center">
    <div class="col">
      <h4 class="modal-title">Edit Student</h4>
    </div>
    <div class="col-auto">
    </div>
  </div>
</div>
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="edit" value="1">
  <input type="hidden" name="id" value="<?= $data->student_id ?>">
  <input type="hidden" name="student_id" value="<?= $data->student_id ?>">
  <input type="hidden" name="default_img" value="<?= $data->student_profile ?>">
  <input type="hidden" name="default_pass" value="<?= $data->student_password ?>">
  <input type="hidden" name="default_semester" value="<?= $data->semester_id ?>">
  <input type="hidden" name="default_year" value="<?= $data->year_id ?>">
  <div class="modal-body">
    <div class="form-group">
      <label for="department-course" class="font-weight-bold">Image:</label>
      <div class="custom-file">
        <input required type="file" class="custom-file-input required" id="student_profile" name="student_profile" accept="image/*">
        <label class="custom-file-label" for="student_profile">Choose file</label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Type:</label>
        <select name="student_status_id" id="student_status_id" class="form-control">
          <?php foreach (get_list("SELECT * from student_status_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['student_status_id'] ?>" <?= $row['student_status_id'] == $data->student_status_id ? "selected" : "" ?>><?= $row['student_status'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Year level:</label>
        <select name="year_id" id="year_id" class="form-control">
          <?php foreach (get_list("SELECT * from year_levels_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['year_id'] ?>" <?= $row['year_id'] == $data->year_id ? "selected" : "" ?>><?= $row['year_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Semester:</label>
        <select name="semester_id" id="semester_id" class="form-control">
          <?php foreach (get_list("SELECT * from semester_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['semester_id'] ?>" <?= $row['semester_id'] == $data->semester_id ? "selected" : "" ?>><?= $row['semester_name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Curriculum:</label>
        <select name="curriculum_id" id="curriculum_id" class="form-control">
          <?php foreach (get_list("SELECT * from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['curriculum_id'] ?>" <?= $row['curriculum_id'] == $data->curriculum_id ? "selected" : "" ?>><?= $row['curriculum_title'] . " S.Y " . $row['curriculum_semester_year_from'] . " to " . $row['curriculum_semester_year_to'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="student_firstname" class="font-weight-bold">First Name:</label>
        <input required type="text" class="form-control" id="student_firstname" name="student_firstname" value="<?= $data->student_firstname ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="student_firstname" class="font-weight-bold">Middle Name:</label>
        <input required type="text" class="form-control" id="student_middlename" name="student_middlename" value="<?= $data->student_middlename ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="student_lastname" class="font-weight-bold">Last Name:</label>
        <input required type="text" class="form-control" id="student_lastname" name="student_lastname" value="<?= $data->student_lastname ?>">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="gender_id" class="font-weight-bold">Gender:</label>
        <select name="gender_id" id="gender_id" class="form-control">
          <?php foreach (get_list("SELECT * from gender_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['gender_id'] ?>" <?= $row['gender_id'] == $data->gender_id ? "selected" : "" ?>><?= $row['gender'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="student_age" class="font-weight-bold">Age:</label>
        <input required type="text" class="form-control" id="student_age" name="student_age" value="<?= $data->student_age ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="student_birth_date" class="font-weight-bold">Birth Date:</label>
        <input required type="date" class="form-control" id="student_birth_date" name="student_birth_date" value="<?= $data->student_birth_date ?>">
      </div>
    </div>

    <!-- <div class="form-row">
      <div class="form-group col-md-6">
        <label for="student_place_of_birth" class="font-weight-bold">Place of Birth:</label>
        <input required type="text" class="form-control" id="student_place_of_birth" name="student_place_of_birth" value="<?= $data->student_place_of_birth ?>">
      </div>
      <div class="form-group col-md-6">
        <label for="age" class="font-weight-bold">Civil Status:</label>
        <select name="civil_status_id" id="civil_status_id" class="form-control">
          <?php foreach (get_list("SELECT * from civil_status_tbl where deleted_flag = 0") as $row) { ?>
            <option value="<?= $row['civil_status_id'] ?>" <?= $row['civil_status_id'] == $data->civil_status_id ? "selected" : "" ?>><?= $row['civil_status'] ?></option>
          <?php } ?>
        </select>
      </div>

    </div> -->

    <!-- <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Address:</label>
        <textarea name="student_address" id="student_address" class="form-control" rows="3"><?= $data->student_address ?></textarea>
      </div>
    </div> -->
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Mobile:</label>
        <input required type="number" class="form-control" id="student_mobile" name="student_mobile" required value="<?= $data->student_mobile ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Email:</label>
        <input required type="email" class="form-control" id="student_email" name="student_email" required value="<?= $data->student_email ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group">
        <label for="department-course" class="font-weight-bold">Password:</label>
        <input type="password" class="form-control" id="student_password" name="student_password">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>

</form>