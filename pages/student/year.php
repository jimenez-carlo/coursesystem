<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM year_levels_tbl where year_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE year_levels_tbl set deleted_flag = '$change_status'  where year_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(year_id) is null, 0, max(year_id) + 1) as `res` from year_levels_tbl  where year_code ='$year_code' or  year_name = '$year_name' limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {


    query("INSERT INTO year_levels_tbl (year_code,year_name) VALUES  ('$year_code', '$year_name') ");
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
  $check_exists = get_one("SELECT if(max(year_id) is null, 0, max(year_id) + 1) as `res` from year_levels_tbl  where (year_code ='$year_code' or  year_name = '$year_name') and year_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE year_levels_tbl set year_code = '$year_code', year_name ='$year_name' where year_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE YEAR LEVEL</h1 style>
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
                  <th>Year Code</th>
                  <th>Year Name</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (get_list("SELECT * from year_levels_tbl") as $row) { ?>
                  <tr>
                    <td><?= $row['year_code'] ?></td>
                    <td><?= $row['year_name'] ?></td>
                    <td>

                      <form method="POST">
                        <input required type="hidden" name="id" value="<?= $row['year_id'] ?>">
                        <input required type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                        <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>' data-toggle="tooltip" title="Change Status"><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                      </form>
                    </td>
                    <td>
                      <form method="POST">
                        <input required type="hidden" name="delete" value="<?= $row['year_id'] ?>">
                        <button type='button' class='btn btn-sm btn-warning button-edit' data-toggle="tooltip" title="Edit" data-id='<?= $row['year_id'] ?>' data-url='edit_year'>
                          <i class='fas fa-edit' data-id='<?= $row['year_id'] ?>' data-url='edit_year'></i>
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
            <h4 class="modal-title" id="modal-add-title">Add Year Level</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input required type="hidden" name="create" value="1">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Year Code:</label>
              <input required type="text" class="form-control" id="year_code" name="year_code" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Year Name:</label>
              <input required type="text" class="form-control" id="year_name" name="year_name" required>
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