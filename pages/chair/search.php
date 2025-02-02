<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['recommended_subject_id'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE recommended_subjects_tbl set feedback = '$feedback'  where recommended_subject_id = " . $recommended_subject_id);
  echo message_success("Updated Feedback!");
}
if (isset($_GET['save_subjects'])) {
  extract($_GET);
  // recommended_subjects_tbl
  $student = get_one("select * from student_tbl where student_id = " . $student_id);
  query("DELETE FROM recommended_subjects_tbl where student_id = " . $student_id . " AND year_id = " . $student->year_id . " AND semester_id = " . $student->semester_id);
  query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) SELECT '$student_id', c.subject_id,c.year_id,c.semester_id,c.pre_subject_id FROM curriculum_subjects_tbl c WHERE c.curriculum_id = '$curriculum_id' and c.year_id = '" . $student->year_id . "' AND c.semester_id =" . $student->semester_id);

  query("UPDATE student_tbl set `confirmed` = '1'  where student_id = " . $student_id);
  echo message_success("Subjects Saved!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE studen_file_tbl set evaluation_status_id = '$evaluation_status_id'  where studen_file_id = " . $change_status);
  echo message_success("Changed Status!");
}
if (isset($_POST['update_feedback'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE studen_file_tbl set feedback = '$feedback'  where studen_file_id = " . $id);
  echo message_success("Updated Feedback!");
}

if (isset($_POST['delete_recommended_subject'])) {
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}

if (isset($_POST['delete_recommendation'])) {
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete_recommendation']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['delete'])) {
  query("DELETE FROM student_subjects_tbl where student_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['grade'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE student_subjects_tbl set grade_id = '$grade_id'  where student_subject_id = " . $_POST['grade']);
  echo message_success("Updated Successfully!");
}

if (isset($_POST['create_recommendation'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(recommended_subject_id) is null, 0, max(recommended_subject_id) + 1) as `res` from recommended_subjects_tbl  where   student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$student_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
    echo "
  <script>  
    document.addEventListener('DOMContentLoaded', 
    function(){
      $('#modal-create-recommendation').modal('show');
    });
  </script>";
    echo message_success("Created Successfully!");
  }
}
if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from student_subjects_tbl  where   student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$student_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
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
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from student_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_subject_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE student_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where student_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}

if (isset($_POST['edit_recommendation'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(recommended_subject_id) is null, 0, max(recommended_subject_id) + 1) as `res` from recommended_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_id <> $student_id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE recommended_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where recommended_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}


?>
<link rel="stylesheet" href="../../evaluation.css">
<div class="student-info" style="margin:unset">
  <form method="GET" action="student_evaluation.php">
    <!-- Student Number Row -->
    <div class="form-row">
      <!-- Name -->
      <div class="form-group">
        <label for="student-name">FIND STUDENT:</label>
        <select name="id" id="" class="form-control select" style="text-transform: uppercase;">
          <?php foreach (get_list("select * from student_tbl where deleted_flag = 0") as $res) { ?>
            <option value="<?= $res['student_id'] ?>"><?= "(#" . $res['student_id'] . ") " . $res['student_firstname'] . " " . $res['student_lastname'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <!-- Name and Course Row -->
    <div class="form-row">
      <!-- Student Number -->
      <div class="form-group">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Search</button>

  </form>
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