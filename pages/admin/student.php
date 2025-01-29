<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM student_tbl where student_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE student_tbl set deleted_flag = '$change_status'  where student_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(student_id) is null, 0, max(student_id) + 1) as `res` from student_tbl  where student_email ='$student_email' limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {


    // File upload handling
    $target_directory = "../../img/";

    // Check if the target directory exists, if not, create it
    if (!file_exists($target_directory) && !mkdir($target_directory, 0777, true)) {
      die('Failed to create target directory. Please check file permissions.');
    }

    $target_file = '';
    if (!empty($_FILES['student_profile']['name'])) {
      $student_profile = $_FILES['student_profile']['name'];
      $target_file = $target_directory . uniqid() . '_' . basename($student_profile);

      // Check if file is an actual image
      if (!getimagesize($_FILES['student_profile']['tmp_name'])) {
        die('File is not an image.');
      }

      // Move the uploaded file to the target directory
      if (!move_uploaded_file($_FILES['student_profile']['tmp_name'], $target_file)) {
        die('File upload failed. Please try again.');
      }
      $student_profile =  $target_file;
    } else {
      $student_profile = '../../dist/img/profile.png';
    }
    $student_password = password_hash($student_password, PASSWORD_DEFAULT);
    $student_id = insert_get_id("INSERT INTO student_tbl 
    (  student_profile ,   student_email  ,  student_password ,  student_firstname ,  student_middlename ,  student_lastname ,  curriculum_id ,  student_status_id,  gender_id  ,student_age, student_birth_date  ,student_mobile,year_id,semester_id) VALUES  
    ('$student_profile', '$student_email' ,'$student_password','$student_firstname','$student_middlename','$student_lastname','$curriculum_id','$student_status_id','$gender_id','$student_age',     '$student_birth_date','$student_mobile','$year_id','$semester_id') ");
    // '$civil_status_id','$student_address'
    query("UPDATE student_tbl set student_username = student_id where student_id = '$student_id'");
    query("INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) SELECT '$student_id', subject_id,year_id,semester_id,pre_subject_id FROM curriculum_subjects_tbl WHERE curriculum_id = '$curriculum_id' ");

    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    // function(){
     //  $('#modal- create').modal('show');
//    });
  </script>";
    echo message_success("Created Successfully!");
  }
}

if (isset($_POST['edit'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(student_id) is null, 0, max(student_id) + 1) as `res` from student_tbl  where (student_email ='$student_email') and student_id <> $id limit 1");
  // File upload handling
  $target_directory = "../../img/";

  // Check if the target directory exists, if not, create it
  if (!file_exists($target_directory) && !mkdir($target_directory, 0777, true)) {
    die('Failed to create target directory. Please check file permissions.');
  }

  $target_file = '';
  if (!empty($_FILES['student_profile']['name'])) {
    $student_profile = $_FILES['student_profile']['name'];
    $target_file = $target_directory . uniqid() . '_' . basename($student_profile);

    // Check if file is an actual image
    if (!getimagesize($_FILES['student_profile']['tmp_name'])) {
      die('File is not an image.');
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['student_profile']['tmp_name'], $target_file)) {
      die('File upload failed. Please try again.');
    }
    $student_profile =  $target_file;
  } else {
    $student_profile = $default_img;
  }

  $student_password = empty($student_password) ? $default_pass : password_hash($student_password, PASSWORD_DEFAULT);
  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE student_tbl set student_profile = '$student_profile', student_email ='$student_email',student_password ='$student_password' ,student_firstname ='$student_firstname',student_lastname ='$student_lastname',student_middlename = '$student_middlename',curriculum_id = '$curriculum_id',student_status_id = '$student_status_id', gender_id= '$gender_id',student_age = '$student_age', student_birth_date = '$student_birth_date', student_mobile ='$student_mobile', year_id = '$year_id', semester_id = '$semester_id'  where student_id = '$id' ");

    if ($semester_id != $default_semester || $year_id != $default_year) {
      query("UPDATE student_tbl  set confirmed = 0 where student_id = " . $student_id);
    }
    // civil_status_id = '$civil_status_id', student_address = '$student_address',
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE STUDENTS</h1 style>
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
                  <button type="button" class="btn btn-sm btn-primary" data-toggle='modal' data-target='#modal-create'>
                    Add Student
                  </button>
                </div>
              </div>
              <div class="col-md-6 text-right">

              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="div card-tabs">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">REGULAR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">IRREGULAR</a>
              </li>
            </ul>
          </div>
          <div class="card-body table-responsive p-3">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                <table class="table table-hover text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>Img</th>
                      <th>Type</th>
                      <th>Full Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Mobile#</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody style="text-transform: uppercase;">
                    <?php foreach (get_list("SELECT a.*,s.student_status,g.gender from student_tbl a inner join student_status_tbl s  on s.student_status_id = a.student_status_id inner join gender_tbl g on g.gender_id = a.gender_id where a.student_status_id = 1") as $row) { ?>
                      <tr>
                        <td><img src="<?= $row['student_profile'] ?>" class="img-circle elevation-2" alt="User Image" width="33" height="33"></td>
                        <td><?= $row['student_status'] ?></td>
                        <td><?= $row['student_firstname'] . " " . $row['student_middlename'] . "" . $row['student_lastname']  ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['student_email'] ?></td>
                        <td><?= $row['student_mobile'] ?></td>
                        <td>

                          <form method="POST">
                            <input type="hidden" name="id" value="<?= $row['student_id'] ?>">
                            <input type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                            <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>' data-toggle="tooltip" title="Change Status"><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                          </form>
                        </td>
                        <td>
                          <form method="POST">
                            <input type="hidden" name="delete" value="<?= $row['student_id'] ?>">
                            <a href="edit_student_details.php?id=<?= $row['student_id'] ?>" class='btn btn-sm btn-warning' data-toggle="tooltip" title="Edit Advance Details">
                              <i class='fas fa-user-edit'></i>
                            </a>
                            <!-- <button type='button' class='btn btn-sm btn-warning'>
                          <i class='fas fa-folder' data-id='<?= $row['student_id'] ?>'></i>
                        </button>
                        <a href="curriculum_courses.php?id=<?= $row['curriculum_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-book'></i>
                        </a>
                        <a href="student_courses.php?id=<?= $row['student_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-bookmark'></i>
                        </a> -->
                            <button type='button' class='btn btn-sm btn-warning button-edit' data-toggle="tooltip" title="Edit" data-id='<?= $row['student_id'] ?>' data-url='edit_student'>
                              <i class='fas fa-edit' data-id='<?= $row['student_id'] ?>' data-url='edit_student'></i>
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
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <table class="table table-hover text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>Img</th>
                      <th>Type</th>
                      <th>Full Name</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Mobile#</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody style="text-transform: uppercase;">
                    <?php foreach (get_list("SELECT a.*,s.student_status,g.gender from student_tbl a inner join student_status_tbl s  on s.student_status_id = a.student_status_id inner join gender_tbl g on g.gender_id = a.gender_id where a.student_status_id = 2") as $row) { ?>
                      <tr>
                        <td><img src="<?= $row['student_profile'] ?>" class="img-circle elevation-2" alt="User Image" width="33" height="33"></td>
                        <td><?= $row['student_status'] ?></td>
                        <td><?= $row['student_firstname'] . " " . $row['student_middlename'] . "" . $row['student_lastname']  ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['student_email'] ?></td>
                        <td><?= $row['student_mobile'] ?></td>
                        <td>

                          <form method="POST">
                            <input type="hidden" name="id" value="<?= $row['student_id'] ?>">
                            <input type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                            <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>' data-toggle="tooltip" title="Change Status"><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                          </form>
                        </td>
                        <td>
                          <form method="POST">
                            <input type="hidden" name="delete" value="<?= $row['student_id'] ?>">
                            <a href="edit_student_details.php?id=<?= $row['student_id'] ?>" class='btn btn-sm btn-warning' data-toggle="tooltip" title="Edit Advance Details">
                              <i class='fas fa-user-edit'></i>
                            </a>
                            <!-- <button type='button' class='btn btn-sm btn-warning'>
                          <i class='fas fa-folder' data-id='<?= $row['student_id'] ?>'></i>
                        </button>
                        <a href="curriculum_courses.php?id=<?= $row['curriculum_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-book'></i>
                        </a>
                        <a href="student_courses.php?id=<?= $row['student_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-bookmark'></i>
                        </a> -->
                            <button type='button' class='btn btn-sm btn-warning button-edit' data-toggle="tooltip" title="Edit" data-id='<?= $row['student_id'] ?>' data-url='edit_student'>
                              <i class='fas fa-edit' data-id='<?= $row['student_id'] ?>' data-url='edit_student'></i>
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


          </div>
          <!-- /.card-body -->
        </div>
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
            <h4 class="modal-title" id="modal-add-title">Add Student</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="create" value="1">
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
                  <option value="<?= $row['student_status_id'] ?>"><?= $row['student_status'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Year level:</label>
              <select name="year_id" id="year_id" class="form-control">
                <?php foreach (get_list("SELECT * from year_levels_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['year_id'] ?>"><?= $row['year_name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Semester:</label>
              <select name="semester_id" id="semester_id" class="form-control">
                <?php foreach (get_list("SELECT * from semester_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['semester_id'] ?>"><?= $row['semester_name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Curriculum:</label>
              <select name="curriculum_id" id="curriculum_id" class="form-control">
                <?php foreach (get_list("SELECT * from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['curriculum_id'] ?>"><?= $row['curriculum_title'] . " S.Y " . $row['curriculum_semester_year_from'] . " to " . $row['curriculum_semester_year_to'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="student_firstname" class="font-weight-bold">First Name:</label>
              <input required type="text" class="form-control" id="student_firstname" name="student_firstname">
            </div>
            <div class="form-group col-md-4">
              <label for="student_firstname" class="font-weight-bold">Middle Name:</label>
              <input required type="text" class="form-control" id="student_middlename" name="student_middlename">
            </div>
            <div class="form-group col-md-4">
              <label for="student_lastname" class="font-weight-bold">Last Name:</label>
              <input required type="text" class="form-control" id="student_lastname" name="student_lastname">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="gender_id" class="font-weight-bold">Gender:</label>
              <select name="gender_id" id="gender_id" class="form-control">
                <?php foreach (get_list("SELECT * from gender_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['gender_id'] ?>"><?= $row['gender'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="student_age" class="font-weight-bold">Age:</label>
              <input required type="text" class="form-control" id="student_age" name="student_age">
            </div>
            <div class="form-group col-md-4">
              <label for="student_birth_date" class="font-weight-bold">Birth Date:</label>
              <input required type="date" class="form-control" id="student_birth_date" name="student_birth_date">
            </div>
          </div>

          <!-- <div class="form-row">
            <div class="form-group col-md-6">
              <label for="student_place_of_birth" class="font-weight-bold">Place of Birth:</label>
              <input required type="text" class="form-control" id="student_place_of_birth" name="student_place_of_birth">
            </div>
            <div class="form-group col-md-6">
              <label for="age" class="font-weight-bold">Civil Status:</label>
              <select name="civil_status_id" id="civil_status_id" class="form-control">
                <?php foreach (get_list("SELECT * from civil_status_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['civil_status_id'] ?>"><?= $row['civil_status'] ?></option>
                <?php } ?>
              </select>
            </div>

          </div> -->

          <!-- <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Address:</label>
              <textarea name="student_address" id="student_address" class="form-control" rows="3"></textarea>
            </div>
          </div> -->
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Mobile:</label>
              <input required type="number" class="form-control" id="student_mobile" name="student_mobile" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Email:</label>
              <input required type="email" class="form-control" id="student_email" name="student_email" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Password:</label>
              <input required type="password" class="form-control" id="student_password" name="student_password" required>
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