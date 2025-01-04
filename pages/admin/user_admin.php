<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM admin_tbl where admin_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE admin_tbl set deleted_flag = '$change_status'  where admin_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(admin_id) is null, 0, max(admin_id) + 1) as `res` from admin_tbl  where admin_email ='$admin_email' limit 1");

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
    if (!empty($_FILES['admin_profile']['name'])) {
      $admin_profile = $_FILES['admin_profile']['name'];
      $target_file = $target_directory . uniqid() . '_' . basename($admin_profile);

      // Check if file is an actual image
      if (!getimagesize($_FILES['admin_profile']['tmp_name'])) {
        die('File is not an image.');
      }

      // Move the uploaded file to the target directory
      if (!move_uploaded_file($_FILES['admin_profile']['tmp_name'], $target_file)) {
        die('File upload failed. Please try again.');
      }
      $admin_profile =  $target_file;
    } else {
      $admin_profile = '../../dist/img/profile.png';
    }
    $admin_password = password_hash($admin_password, PASSWORD_DEFAULT);
    query("INSERT INTO admin_tbl (admin_profile, admin_email ,admin_password,admin_firstname,admin_lastname,access_id,department_id) VALUES  ('$admin_profile', '$admin_email' ,'$admin_password','$admin_firstname','$admin_lastname','$access_id', '$department_id') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      $('#modal-create').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}

if (isset($_POST['edit'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(admin_id) is null, 0, max(admin_id) + 1) as `res` from admin_tbl  where (admin_email ='$admin_email') and admin_id <> $id limit 1");
  // File upload handling
  $target_directory = "../../img/";

  // Check if the target directory exists, if not, create it
  if (!file_exists($target_directory) && !mkdir($target_directory, 0777, true)) {
    die('Failed to create target directory. Please check file permissions.');
  }

  $target_file = '';
  if (!empty($_FILES['admin_profile']['name'])) {
    $admin_profile = $_FILES['admin_profile']['name'];
    $target_file = $target_directory . uniqid() . '_' . basename($admin_profile);

    // Check if file is an actual image
    if (!getimagesize($_FILES['admin_profile']['tmp_name'])) {
      die('File is not an image.');
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES['admin_profile']['tmp_name'], $target_file)) {
      die('File upload failed. Please try again.');
    }
    $admin_profile =  $target_file;
  } else {
    $admin_profile = $default_img;
  }

  $admin_password = empty($admin_password) ? $default_pass : password_hash($admin_password, PASSWORD_DEFAULT);
  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE admin_tbl set admin_profile = '$admin_profile', admin_email ='$admin_email',admin_password ='$admin_password' ,admin_firstname ='$admin_firstname',admin_lastname ='$admin_lastname',access_id ='$access_id', department_id = '$department_id' where admin_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE ADMIN</h1 style>
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
                    Add Admin
                  </button>
                </div>
              </div>
              <div class="col-md-6 text-right">

              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-3">
            <table class="table table-hover text-nowrap datatable">
              <thead>
                <tr>
                  <th>Department</th>
                  <th>Role</th>
                  <th>Img</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody style="text-transform: uppercase;">
                <?php foreach (get_list("SELECT aa.access_role,a.*,d.* from admin_tbl a inner join access_tbl aa on aa.access_id = a.access_id inner join department_tbl d on d.department_id = a.department_id") as $row) { ?>
                  <tr>
                    <td><?= $row['department_code'] . " (" . $row['department_title'] . ")" ?></td>
                    <td><?= $row['access_role'] ?></td>
                    <td><img src="<?= $row['admin_profile'] ?>" class="img-circle elevation-2" alt="User Image" width="33" height="33"></td>
                    <td><?= $row['admin_firstname'] ?></td>
                    <td><?= $row['admin_lastname'] ?></td>
                    <td><?= $row['admin_email'] ?></td>
                    <td>

                      <form method="POST">
                        <input type="hidden" name="id" value="<?= $row['admin_id'] ?>">
                        <input type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                        <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>'><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                      </form>
                    </td>
                    <td>
                      <form method="POST">
                        <input type="hidden" name="delete" value="<?= $row['admin_id'] ?>">
                        <button type='button' class='btn btn-sm btn-warning button-edit' data-id='<?= $row['admin_id'] ?>' data-url='edit_user_admin'>
                          <i class='fas fa-edit' data-id='<?= $row['admin_id'] ?>' data-url='edit_user_admin'></i>
                        </button>
                        <button type="submit" class='btn btn-sm btn-danger delete'>
                          <i class='fas fa-trash'></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php }  ?>
              </tbody>
            </table>

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
            <h4 class="modal-title" id="modal-add-title">Add User</h4>
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
              <input type="file" class="custom-file-input" id="admin_profile" name="admin_profile" accept="image/*">
              <label class="custom-file-label" for="admin_profile">Choose file</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Department:</label>
              <select name="department_id" id="department_id" class="form-control">
                <?php foreach (get_list("SELECT * from department_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['department_id'] ?>"><?= $row['department_code'] . " (" . $row['department_title'] . ")" ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="admin_firstname" class="font-weight-bold">First Name:</label>
              <input type="text" class="form-control" id="admin_firstname" name="admin_firstname">
            </div>
            <div class="form-group col-md-6">
              <label for="admin_lastname" class="font-weight-bold">Last Name:</label>
              <input type="text" class="form-control" id="admin_lastname" name="admin_lastname">
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Role:</label>
              <select name="access_id" id="access_id" class="form-control">
                <?php foreach (get_list("SELECT * from access_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['access_id'] ?>"><?= $row['access_role'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Email:</label>
              <input type="email" class="form-control" id="admin_email" name="admin_email" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Password:</label>
              <input type="password" class="form-control" id="admin_password" name="admin_password" required>
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