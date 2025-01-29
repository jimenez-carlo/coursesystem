<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM subject_tbl where subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE subject_tbl set deleted_flag = '$change_status'  where subject_id = $id");
  echo message_success("Changed Status Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(subject_id) is null, 0, max(subject_id) + 1) as `res` from subject_tbl  where subject_code ='$subject_code' and  subject_title = '$subject_title' and  subject_unit = '$subject_unit'  and  class_type_id = '$class_type_id' limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {


    query("INSERT INTO subject_tbl (subject_code,subject_title,subject_unit,class_type_id) VALUES  ('$subject_code','$subject_title','$subject_unit','$class_type_id') ");
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
  $check_exists = get_one("SELECT if(max(subject_id) is null, 0, max(subject_id) + 1) as `res` from subject_tbl  where (subject_code ='$subject_code' and  subject_title = '$subject_title' and  subject_unit = '$subject_unit'  and  class_type_id = '$class_type_id') and subject_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE subject_tbl set subject_code = '$subject_code', subject_title ='$subject_title',subject_unit ='$subject_unit',class_type_id ='$class_type_id'  where subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}






?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-weight: bold;">MANAGE COURSE'S</h1 style>
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
                    Add Course
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
                  <!-- <th>Program</th> -->
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Unit</th>
                  <th>Type</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody style="text-transform: uppercase;">
                <?php foreach (get_list("SELECT p.*,c.*,s.* from subject_tbl s left join program_tbl p on p.program_id = s.program_id inner join class_type_tbl c on s.class_type_id = c.class_type_id") as $row) { ?>
                  <tr>
                    <!-- <td><?= $row['program_code'] . " (" . $row['program_title'] . ")" ?></td> -->
                    <td><?= $row['subject_code']  ?></td>
                    <td><?= $row['subject_title'] ?></td>
                    <td><?= $row['subject_unit'] ?></td>
                    <td><?= $row['class_type_name'] ?></td>
                    <td>

                      <form method="POST">
                        <input required type="hidden" name="id" value="<?= $row['subject_id'] ?>">
                        <input required type="hidden" name="change_status" value="<?= !$row['deleted_flag'] ?>">
                        <button type="submit" class='btn btn-sm btn-<?= empty($row['deleted_flag']) ? "success" : "danger" ?>' data-toggle="tooltip" title="Change Status"><?= empty($row['deleted_flag']) ? "Active" : "Disabled" ?></button>
                      </form>
                    </td>
                    <td>
                      <form method="POST">
                        <input required type="hidden" name="delete" value="<?= $row['subject_id'] ?>">
                        <button type='button' class='btn btn-sm btn-warning button-edit' data-toggle="tooltip" title="Edit" data-id='<?= $row['subject_id'] ?>' data-url='edit_course'>
                          <i class='fas fa-edit' data-id='<?= $row['subject_id'] ?>' data-url='edit_course'></i>
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
            <h4 class="modal-title" id="modal-add-title">Add Course</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input required type="hidden" name="create" value="1">
        <div class="modal-body">
          <!-- <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Program:</label>
              <select name="program_id" id="program_id" class="form-control">
                <?php foreach (get_list("SELECT * from program_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['program_id'] ?>"><?= $row['program_code'] ?> (<?= $row['program_title'] ?>)</option>
                <?php } ?>
              </select>
            </div>
          </div> -->
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Class Type:</label>
              <select name="class_type_id" id="class_type_id" class="form-control">
                <?php foreach (get_list("SELECT * from class_type_tbl where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['class_type_id'] ?>"><?= $row['class_type_name'] ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course Code:</label>
              <input required type="text" class="form-control" id="subject_code" name="subject_code" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course Name:</label>
              <input required type="text" class="form-control" id="subject_title" name="subject_title" required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Unit:</label>
              <input required type="number" class="form-control" id="subject_unit" name="subject_unit" required>
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