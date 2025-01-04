<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM department_tbl where department_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE department_tbl set deleted_flag = '$change_status'  where department_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(department_id) is null, 0, max(department_id) + 1) as `res` from department_tbl  where department_code ='$department_code' or  department_title = '$department_title' limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {


    query("INSERT INTO department_tbl (department_code,department_title) VALUES  ('$department_code', '$department_title') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      // $('#modal-create').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}

if (isset($_POST['edit'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(department_id) is null, 0, max(department_id) + 1) as `res` from department_tbl  where (department_code ='$department_code' or  department_title = '$department_title') and department_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE department_tbl set department_code = '$department_code', department_title ='$department_title' where department_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE DEPARTMENT</h1 style>
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

              </div>
              <div class="col-md-6 text-right">
                <div class="card-tools">
                  <button type="button" class="btn btn-sm btn-default" data-toggle='modal' data-target='#modal-create'>
                    <i class="nav-icon fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-3">
            <table class="table table-hover text-nowrap datatable" style="text-transform: uppercase;">
              <thead>
                <tr>
                  <th>Department Code</th>
                  <th>Department Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("SELECT * from department_tbl") as $row) { ?>
                  <tr>
                    <td><?= $row['department_code'] ?></td>
                    <td><?= $row['department_title'] ?></td>
                    <td>

                      <form method="POST">
                        <input type="hidden" name="id" value="<?= $row['department_id'] ?>">
                        <input type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                        <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>'><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                      </form>
                    </td>
                    <td>
                      <form method="POST">
                        <input type="hidden" name="delete" value="<?= $row['department_id'] ?>">
                        <button type='button' class='btn btn-sm btn-warning button-edit' data-id='<?= $row['department_id'] ?>' data-url='edit_department'>
                          <i class='fas fa-edit' data-id='<?= $row['department_id'] ?>' data-url='edit_department'></i>
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
            <h4 class="modal-title" id="modal-add-title">Add Department</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="create" value="1">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Department Code:</label>
              <input type="text" class="form-control" id="department_code" name="department_code" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Department Name:</label>
              <input type="text" class="form-control" id="department_title" name="department_title" required>
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