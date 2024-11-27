<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM curriculum_tbl where curriculum_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract($_POST);
  query("UPDATE curriculum_tbl set deleted_flag = '$change_status'  where curriculum_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract($_POST);
  $check_exists = get_one("SELECT if(max(curriculum_id) is null, 0, max(curriculum_id) + 1) as `res` from curriculum_tbl  where   curriculum_title = '$curriculum_title' and  program_id = '$program_id' and  curriculum_semester_id = '$curriculum_semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {


    query("INSERT INTO curriculum_tbl (program_id,curriculum_title,curriculum_description,curriculum_semester_id) VALUES  ('$program_id','$curriculum_title','$curriculum_description','$curriculum_semester_id') ");
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
  extract($_POST);
  $check_exists = get_one("SELECT if(max(curriculum_id) is null, 0, max(curriculum_id) + 1) as `res` from curriculum_tbl  where (curriculum_title = '$curriculum_title' and  program_id = '$program_id' and  curriculum_semester_id = '$curriculum_semester_id') and curriculum_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE curriculum_tbl set curriculum_title = '$curriculum_title', program_id ='$program_id',curriculum_semester_id ='$curriculum_semester_id',`curriculum_description` ='$curriculum_description'  where curriculum_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE CURRICULUM</h1 style>
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
              <div class="col-md-11">

              </div>
              <div class="col-md-1 text-right">
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
            <table class="table table-hover text-nowrap datatable">
              <thead>
                <tr>
                  <th>Program</th>
                  <th>S.Y.</th>
                  <th>Curriculum Code</th>
                  <th>Curriculum Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody style="text-transform: uppercase;">
                <?php foreach (get_list("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where p.department_id =  " . $_SESSION['user_department_id']) as $row) { ?>
                  <tr>
                    <td><?= $row['program_code'] . " (" . $row['program_title'] . ")" ?></td>
                    <td><?= $row['curriculum_semester_year_from'] ?> - <?= $row['curriculum_semester_year_to'] ?></td>
                    <td><?= $row['curriculum_title']  ?></td>
                    <td><?= $row['curriculum_description'] ?></td>
                    <td>

                      <form method="POST">
                        <input type="hidden" name="id" value="<?= $row['curriculum_id'] ?>">
                        <input type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                        <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>'><?= empty($row['deleted_flag']) ? "Active" : "Inactive" ?></button>
                      </form>
                    </td>
                    <td>
                      <form method="POST">
                        <input type="hidden" name="delete" value="<?= $row['curriculum_id'] ?>">
                        <a href="curriculum_students.php?id=<?= $row['curriculum_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-user'></i>
                        </a>
                        <a href="curriculum_courses.php?id=<?= $row['curriculum_id'] ?>" class='btn btn-sm btn-warning'>
                          <i class='fas fa-book'></i>
                        </a>
                        <button type='button' class='btn btn-sm btn-warning button-edit' data-id='<?= $row['curriculum_id'] ?>' data-url='edit_curriculum'>
                          <i class='fas fa-edit' data-id='<?= $row['curriculum_id'] ?>' data-url='edit_curriculum'></i>
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
            <h4 class="modal-title" id="modal-add-title">Add Curriculum</h4>
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
              <label for="department-course" class="font-weight-bold">Program:</label>
              <select name="program_id" id="program_id" class="form-control">
                <?php foreach (get_list("SELECT * from program_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['program_id'] ?>"><?= $row['program_code'] ?> (<?= $row['program_title'] ?>)</option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">S.Y.:</label>
              <select name="curriculum_semester_id" id="curriculum_semester_id" class="form-control">
                <?php foreach (get_list("SELECT * from curriculum_semester_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['curriculum_semester_id'] ?>"><?= $row['curriculum_semester_year_from'] ?> to <?= $row['curriculum_semester_year_to'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Curriculum title:</label>
              <input type="text" class="form-control" id="curriculum_title" name="curriculum_title" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Curriculum Description:</label>
              <textarea name="curriculum_description" id="curriculum_description" row="6" class="form-control"></textarea>
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