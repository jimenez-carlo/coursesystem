<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM student_subjects_tbl where student_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['grade'])) {
  extract($_POST);
  query("UPDATE student_subjects_tbl set grade_id = '$grade_id'  where student_subject_id = " . $_POST['grade']);
  echo message_success("Updated Successfully!");
}

if (isset($_POST['upload'])) {
  extract($_POST);

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
    if (!empty($_FILES['filename']['name'])) {
      $filename = $_FILES['filename']['name'];
      $target_file = $target_directory . uniqid() . '_' . basename($filename);

      // Check if file is an actual image
      if (!getimagesize($_FILES['filename']['tmp_name'])) {
        die('File is not an image.');
      }

      // Move the uploaded file to the target directory
      if (!move_uploaded_file($_FILES['filename']['tmp_name'], $target_file)) {
        die('File upload failed. Please try again.');
      }
      $filename =  $target_file;
    } else {
      $filename = '../../dist/img/profile.png';
    }

    query("INSERT INTO studen_file_tbl (student_id,evaluation_status_id,`file_name`) VALUES ('" . $_SESSION['user_id'] . "',1,'$filename')");

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
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from student_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_subject_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE student_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where student_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}
$student_data = get_one("SELECT * from student_tbl where student_id = " . $_SESSION['user_id']);
$data = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $student_data->curriculum_id);



?>

<div class="main-content">
  <h1 class="first-semester-heading" style="font-weight: bold;text-transform:uppercase"><?= $student_data->student_lastname . ", " . $student_data->student_firstname ?> COURSE <?= " " . $data->program_title . " - S.Y. " . $data->curriculum_semester_year_from . " to " . $data->curriculum_semester_year_to ?></h1>

  <form method="post" style="margin-left:16em" enctype="multipart/form-data">

    <input type="file" id="file-upload" class="upload-btn" accept="image/*" required name="filename">
    <button class="btn btn-sm btn-primary" type="submit" name="upload">Upload Individual Evaluation Report </button>
  </form>
  <table class="first-semester-table">
    <thead>
      <tr>
        <!-- <th>Year</th>
        <th>Semester</th> -->
        <th>Filename</th>
        <th>Status</th>
        <th>Feedback</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (get_list("SELECT * from studen_file_tbl f inner join evaluation_status_tbl es on es.evaluation_status_id = f.evaluation_status_id left join semester_tbl s on s.semester_id = f.semester_id left join  year_levels_tbl y on y.year_id = f.year_id where f.student_id = " . $_SESSION['user_id']) as $row2) { ?>
        <tr>
          <!-- <td><?= $row2['year_name'] ?></td>
          <td><?= $row2['semester_name'] ?></td> -->
          <td><a href="<?= $row2['file_name'] ?>" download class="btn btn-sm btn-primary">Download <i class='fas fa-download'></i></a></td>
          <td>
            <?= $row2['evaluation_status'] ?>
            <!-- <form method="POST">

              <div class="input-group input-group">
                <input type="hidden" name="evaluate">
                <select name="evaluation_status_id" id="evaluation_status_id" class="form-control">

                  <?php foreach (get_list("SELECT * from evaluation_status_tbl  where deleted_flag = 0") as $row) { ?>
                    <option value="<?= $row['evaluation_status_id'] ?>" <?= $row['evaluation_status_id'] == $row2['evaluation_status_id'] ? "selected" : "" ?>><?= $row['evaluation_status'] ?> </option>
                  <?php } ?>
                </select>
                <button type="submit" class="btn btn-primary btn-flat btn-sm"> <i class='fas fa-save'></i></button>
              </div>


            </form> -->
          </td>
          <td><?= $row2['feedback'] ?></td>

        </tr>
      <?php }  ?>

    </tbody>
  </table>

</div>


<?php
include_once('footer.php');

?>