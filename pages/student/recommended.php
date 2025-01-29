<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['delete'])) {
  query("DELETE FROM recommended_subjects_tbl where student_subject_id = " . $_POST['delete']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['grade'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE recommended_subjects_tbl set grade_id = '$grade_id'  where student_subject_id = " . $_POST['grade']);
  echo message_success("Updated Successfully!");
}

if (isset($_POST['create'])) {
  extract(array_map('addslashes', $_POST));
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from recommended_subjects_tbl  where   student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id'  limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already Exists!");
  } else {
    query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id, pre_subject_id) VALUES  ('$student_id','$subject_id','$year_id','$semester_id', '$pre_subject_id') ");
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
  $check_exists = get_one("SELECT if(max(student_subject_id) is null, 0, max(student_subject_id) + 1) as `res` from recommended_subjects_tbl  where (student_id = '$student_id' and  subject_id = '$subject_id' and  year_id = '$year_id'  and  semester_id = '$semester_id' ) and student_subject_id <> $id limit 1");

  if (!empty($check_exists->res)) {
    echo message_error("Record Already In-use!");
  } else {
    query("UPDATE recommended_subjects_tbl set  subject_id ='$subject_id',year_id ='$year_id',`semester_id` ='$semester_id', `pre_subject_id` = '$pre_subject_id'  where student_subject_id = '$id' ");
    echo message_success("Updated Successfully!");
  }
}
$student_data = get_one("SELECT * from student_tbl where student_id = " . $_SESSION['user_id']);
$data = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $student_data->curriculum_id);



?>

<div class="main-content">
  <h1 class="first-semester-heading" style="font-weight: bold;text-transform:uppercase"><?= $student_data->student_lastname . ", " . $student_data->student_firstname ?> COURSE <?= " " . $data->program_title . " - S.Y. " . $data->curriculum_semester_year_from . " to " . $data->curriculum_semester_year_to ?></h1>

  <?php

  foreach (get_list("SELECT * from recommended_subjects_tbl cd inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id where cd.student_id = '" .  $_SESSION['user_id'] . "' AND cd.semester_id = " . $student_data->semester_id . " AND cd.year_id = " . $student_data->year_id . " GROUP BY y.year_id,ss.semester_id ORDER BY y.year_id,ss.semester_id ") as $row) {

  ?>
    <h2 class="first-semester-heading"><?= $row['year_name'] ?> <span style="float:right"><?= $row['semester_name'] ?></span></h2>
    <table class="recommendation-table">
      <thead>
        <tr>
          <th>Course Code</th>
          <th>Description</th>
          <th>Type</th>
          <th>Unit</th>
          <th>Co/Prerequisite</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from recommended_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.student_id = '" .  $_SESSION['user_id'] . "' AND y.year_id = '" . $row['year_id'] . "' AND ss.semester_id = '" . $row['semester_id'] . "' ORDER BY y.year_id,ss.semester_id") as $row2) { ?>
          <tr>

            <td><?= $row2['subject_code'] ?></td>
            <td><?= $row2['subject_title'] ?></td>
            <td><?= $row2['class_type_name']  ?></td>
            <td><?= $row2['subject_unit'] ?></td>
            <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>

          </tr>
        <?php }  ?>

      </tbody>
    </table>
  <?php
  }
  ?>

</div>


<?php
include_once('footer.php');

?>