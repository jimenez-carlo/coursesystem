<?php
include_once('../../conn.php');
include_once('../../functions.php');
include_once('header.php');

if (isset($_POST['change_year'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE student_tbl set year_id = '$year_id', semester_id = '$semester_id',`confirmed` = 0  where student_id = " . $student_id);
  query("DELETE FROM recommended_subjects_tbl where student_id = " . $student_id);
  echo message_success("Student Updated!");
}

if (isset($_POST['feedback'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE recommended_subjects_tbl set feedback = '$feedback'  where recommended_subject_id = " . $recommended_subject_id);
  echo message_success("Updated Feedback!");
}
if (isset($_GET['save_subjects'])) {
  extract($_GET);
  // recommended_subjects_tbl
  $subjects = explode(",", $_GET['subjects']);
  $presubjects = explode(",", $_GET['presubjects']);
  $student = get_one("select * from student_tbl where student_id = " . $student_id);
  query("DELETE FROM recommended_subjects_tbl where student_id = " . $student_id);

  foreach ($subjects as $key => $res) {
    query("DELETE  from student_subjects_tbl where subject_id = '" . $res . "'  and student_id = '" . $student_id . "'");
    query("INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('" . $student_id . "','" . $res . "','$year_id', '$semester_id','" . $presubjects[$key] . "')");
    query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('" . $student_id . "','" . $res . "','$year_id', '$semester_id','" . $presubjects[$key] . "')");
  }
  // query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) SELECT '$student_id', c.subject_id,c.year_id,c.semester_id,c.pre_subject_id FROM curriculum_subjects_tbl c WHERE  c.curriculum_id <= '$curriculum_id' and c.year_id <= '" . $student->year_id . "' AND c.semester_id <=" . $student->semester_id . " AND c.subject_id IN (SELECT subject_id from student_subjects_tbl WHERE grade_id IN(11,12,13,14,15))");

  query("UPDATE student_tbl set `confirmed` = '1'  where student_id = " . $student_id);
  echo message_success("Subjects Saved!");
}

if (isset($_POST['change_status'])) {
  extract(array_map('addslashes', $_POST));
  query("UPDATE studen_file_tbl set evaluation_status_id = '$evaluation_status_id'  where studen_file_id = " . $change_status);
  echo message_success("Changed Status!");
}


// if (isset($_POST['feedback'])) {
//   extract(array_map('addslashes', $_POST));
//   query("UPDATE recommended_subjects_tbl set feedback='$feedback' WHERE recommended_subject_id = " . $recommended_subject_id);
//   echo message_success("Updated Successfully!");
// }

if (isset($_POST['delete_recommendation'])) {
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete_recommendation']);
  echo message_success("Deleted Successfully!");
}
if (isset($_POST['delete_subject'])) {
  extract($_POST);
  query("DELETE FROM recommended_subjects_tbl where recommended_subject_id = " . $_POST['delete_subject']);
  query("DELETE FROM student_subjects_tbl where student_id = '" . $_POST['student_id'] . "' and subject_id = " . $_POST['subject_id']);
  echo message_success("Subject Deleted Successfully!");
}
if (isset($_POST['add_subject'])) {
  extract($_POST);
  if (intval($ctr) + intval($subject_unit) > $max_units) {
    echo message_error("Maximum units exceed!");
  }
  query("INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('$student_id','$add_subject','$year_id','$semester_id','$pre_subject_id')");
  query("INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('$student_id','$add_subject','$year_id','$semester_id','$pre_subject_id')");
  // echo "INSERT INTO student_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('$student_id','$add_subject','$year_id','$semester_id','$pre_subject_id')";
  // echo "INSERT INTO recommended_subjects_tbl (student_id,subject_id,year_id,semester_id,pre_subject_id) VALUES ('$student_id','$add_subject','$year_id','$semester_id','$pre_subject_id')";
  echo message_success("Subject Added Successfully!");
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
$student_data = get_one("SELECT * from student_tbl s inner join year_levels_tbl y on y.year_id = s.year_id inner join semester_tbl ss on ss.semester_id = s.semester_id where s.student_id = " . $_GET['id']);
$data = get_one("SELECT p.*,s.*,c.* from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id inner join curriculum_semester_tbl s on s.curriculum_semester_id = c.curriculum_semester_id where c.curriculum_id = " . $student_data->curriculum_id);
$student_units = get_one("SELECT sum(subject_unit) as total_units FROM curriculum_subjects_tbl  cs inner join subject_tbl s on s.subject_id = cs.subject_id where cs.year_id = " . $student_data->year_id . " and cs.semester_id = " . $student_data->semester_id . " and  cs.curriculum_id = " . $student_data->curriculum_id)->total_units;
$passed_subjects =  get_one("SELECT ifnull(group_concat(s.subject_id),0) as ids from student_subjects_tbl s where s.grade_id not in (1, 11, 12, 13, 14, 15) and s.student_id = " . $student_data->student_id)->ids;
$curriculum_subjects =  get_one("SELECT ifnull(group_concat(s.subject_id),0) as ids from curriculum_subjects_tbl s where s.year_id = '" . $student_data->year_id . "' and s.semester_id = '" . $student_data->year_id . "'")->ids;
$recommended_subjects =  get_one("SELECT ifnull(group_concat(s.subject_id),0) as ids from recommended_subjects_tbl s where s.student_id = '" . $student_data->student_id . "' and  s.year_id = '" . $student_data->year_id . "' and s.semester_id = '" . $student_data->year_id . "'")->ids;

?>
<link rel="stylesheet" href="../../evaluation.css">

<div class="student-info">
  <form method="post">
    <input required type="hidden" name="student_id" value="<?= $student_data->student_id ?>">

    <div id="main-content">
      <!-- Student Number Row -->
      <div class="form-row">
        <!-- Name -->
        <div class="form-group">
          <label for="student-name">Name:</label>
          <input required type="text" id="student-name" readonly value="<?= $student_data->student_firstname . " " . $student_data->student_middlename . " " . $student_data->student_lastname ?>" disabled>
        </div>
      </div>

      <!-- Name and Course Row -->
      <div class="form-row">
        <!-- Student Number -->
        <div class="form-group">
          <label for="student-no">Student Number:</label>
          <input required type="text" id="student-no" readonly value="<?= $student_data->student_id  ?>" disabled>
        </div>
        <!-- Course -->
        <div class="form-group">
          <label for="course">Course:</label>
          <input required type="text" id="course" readonly value="<?= $data->program_title ?>" disabled>
        </div>
      </div>

      <!-- Year, Semester, and School Year Row -->
      <div class="form-row">
        <!-- Year -->
        <div class="form-group">
          <label for="year">Year:</label>
          <select name="year_id" id="year_id" class="">

            <?php foreach (get_list("SELECT * from year_levels_tbl  where deleted_flag = 0") as $row) { ?>
              <option value="<?= $row['year_id'] ?>" <?= $row['year_id'] == $student_data->year_id ? "selected" : "" ?>><?= $row['year_name'] ?> </option>
            <?php } ?>
          </select>
        </div>
        <!-- Semester -->
        <div class="form-group">
          <label for="semester">Semester:</label>

          <select name="semester_id" id="semester_id" class="">

            <?php foreach (get_list("SELECT * from semester_tbl  where deleted_flag = 0") as $row) { ?>
              <option value="<?= $row['semester_id'] ?>" <?= $row['semester_id'] == $student_data->semester_id ? "selected" : "" ?>><?= $row['semester_name'] ?> </option>
            <?php } ?>
          </select>
        </div>
        <!-- School Year -->
        <div class="form-group">
          <label for="school-year">School Year:</label>
          <input required type="text" id="school-year" readonly value="S.Y. <?= $data->curriculum_semester_year_from . " - " . $data->curriculum_semester_year_to ?>" disabled>
        </div>
      </div>
    </div>

    <div class="form-row">
      <button type="submit" name="change_year" class="btn btn-primary btn-sm btn-flat">Update</button>
    </div>
  </form>
</div>

<!-- Load Subjects Button -->
<div class="button-container">
  <form method="get">

    <input required type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <input required type="hidden" name="load_subjects" value="1">
    <button class="btn" type="submit">Load Subjects</button>
  </form>
</div>


<div class="main-content">

  <?php if (isset($_GET['load_subjects'])) { ?>
    <div id="printTable">
      <table class="subjects-table">
        <thead>
          <tr>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Units</th>
            <th>Class Type</th>
            <th>Pre-requisite</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $unit_ctr = 0;
          $ctr = 0;
          $subjects = [];
          $presubjects = [];
          ?>
          <?php if (!$student_data->confirmed) { ?>

            <?php foreach (
              get_list(
                "SELECT 
                  y.year_id,se.semester_id,year_name,se.semester_name,cs.pre_subject_id,s.*,s2.subject_title as pre_subject_title,s2.subject_code as pre_subject_code,ct.* FROM curriculum_subjects_tbl cs 
              inner join subject_tbl s on s.subject_id = cs.subject_id 
              left join subject_tbl s2 on s2.subject_id = cs.pre_subject_id
              inner join year_levels_tbl y on y.year_id = cs.year_id 
              inner join semester_tbl se on se.semester_id = cs.semester_id 
              inner join class_type_tbl ct on ct.class_type_id = s.class_type_id

              where cs.curriculum_id = " . $student_data->curriculum_id . " and cs.semester_id = " . $student_data->semester_id . " and cs.year_id = " . $student_data->year_id . " 
              and ((cs.pre_subject_id in (SELECT sy.subject_id from student_subjects_tbl sy where sy.grade_id not in (1, 11, 12, 13, 14, 15) and sy.student_id = " . $student_data->student_id . ") or cs.pre_subject_id = 0))
               order by cs.year_id,cs.semester_id"
              ) as $row2
            ) { ?>
              <tr>

                <td><?= $row2['subject_code'] ?></td>
                <td><?= $row2['subject_title'] ?></td>
                <td><?= $row2['subject_unit'] ?></td>
                <td><?= $row2['class_type_name']  ?></td>
                <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
                <td> </td>
              </tr>
              <?php
              $ctr += $row2['subject_unit'];
              $subjects[] = $row2['subject_id'];
              $presubjects[] = $row2['pre_subject_id'];
              $unit_ctr += $row2['subject_unit'] ?>
            <?php }  ?>
          <?php } else { ?>
            <?php foreach (
              get_list(
                "SELECT 
                  cs.recommended_subject_id,y.year_id,se.semester_id,year_name,se.semester_name,cs.pre_subject_id,s.*,cs.subject_id,s2.subject_title as pre_subject_title,s2.subject_code as pre_subject_code,ct.* FROM recommended_subjects_tbl cs 
              inner join subject_tbl s on s.subject_id = cs.subject_id 
              left join subject_tbl s2 on s2.subject_id = cs.pre_subject_id
              inner join year_levels_tbl y on y.year_id = cs.year_id 
              inner join semester_tbl se on se.semester_id = cs.semester_id 
              inner join class_type_tbl ct on ct.class_type_id = s.class_type_id
              where cs.student_id = " . $student_data->student_id . " order by cs.year_id,cs.semester_id"
              ) as $row2
            ) { ?>
              <tr>

                <td><?= $row2['subject_code'] ?></td>
                <td><?= $row2['subject_title'] ?></td>
                <td><?= $row2['subject_unit'] ?></td>
                <td><?= $row2['class_type_name']  ?></td>
                <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
                <td>
                  <?php if (in_array($row2['subject_id'], explode(",", $curriculum_subjects))) { ?>
                    <form method="post">
                      <input required type="hidden" name="subject_id" value="<?= $row2['subject_id'] ?>">
                      <input required type="hidden" name="student_id" value="<?= $student_data->student_id ?>">
                      <button type="submit" name="delete_subject" class="btn btn-flat btn-sm btn-danger" value="<?= $row2['recommended_subject_id'] ?>"><i class="fa fa-trash"></i></button>
                    </form>
                  <?php } ?>
                </td>
              </tr>
              <?php
              $ctr += $row2['subject_unit'];
              $subjects[] = $row2['subject_id'];
              $presubjects[] = $row2['pre_subject_id'];
              $unit_ctr += $row2['subject_unit'] ?>
            <?php }  ?>
          <?php }  ?>

        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" style="text-align: right; font-weight: bold;">Total Units:</td>
            <td id="total-units" style=><?= $ctr ?></td>
            <td colspan="3"></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- Save Subjects Button -->


  <?php } ?>

  <?php if (isset($_GET['load_subjects'])) { ?>
    <table class="recommendation-table">
      <h2>Recommendation</h2>
      <thead>
        <tr>
          <th>Course Code</th>
          <th>Course Title</th>
          <th>Units</th>
          <th>Class Type</th>
          <th>Pre-requisite</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (
          get_list(
            "SELECT 
              y.year_id,se.semester_id,year_name,se.semester_name,cs.pre_subject_id,s.*,s2.subject_title as pre_subject_title,s2.subject_code as pre_subject_code,ct.* FROM curriculum_subjects_tbl cs 
              inner join subject_tbl s on s.subject_id = cs.subject_id 
              left join subject_tbl s2 on s2.subject_id = cs.pre_subject_id
              inner join year_levels_tbl y on y.year_id = cs.year_id 
              inner join semester_tbl se on se.semester_id = cs.semester_id 
              inner join class_type_tbl ct on ct.class_type_id = s.class_type_id
              left join student_subjects_tbl std on cs.pre_subject_id = std.subject_id and std.student_id = " . $student_data->student_id . "
              where cs.curriculum_id = " . $student_data->curriculum_id . " and cs.semester_id = " . $student_data->semester_id . " and cs.year_id <= " . ($student_data->year_id + 1) . " 
              and (cs.pre_subject_id in (SELECT sy.subject_id from student_subjects_tbl sy where sy.grade_id not in (1, 11, 12, 13, 14, 15) and sy.student_id = " . $student_data->student_id . ") or cs.pre_subject_id = 0)
              order by cs.year_id,cs.semester_id"
          ) as $row2
          // "SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from student_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.student_id = '" . $_GET['id'] . "' AND y.year_id <= '" . $student_data->year_id . "' AND ss.semester_id <= '" . $student_data->semester_id . "' and cd.grade_id in (11,12,13,14,15) ORDER BY y.year_id,ss.semester_id "
        ) {
          // if ($unit_ctr >= $student_units) {
          //   continue;
          // }

        ?>
          <?php if (!in_array($row2['subject_id'], $subjects) && !in_array($row2['subject_id'], explode(",", $passed_subjects))) { ?>
            <tr>

              <td><?= $row2['subject_code'] ?></td>
              <td><?= $row2['subject_title'] ?></td>
              <td><?= $row2['subject_unit'] ?></td>
              <td><?= $row2['class_type_name']  ?></td>
              <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>
              <td>
                <?php if (!in_array($row2['subject_id'], explode(",", $passed_subjects))) { ?>
                  <form method="post">
                    <input required type="hidden" name="year_id" value="<?= $student_data->year_id ?>">
                    <input required type="hidden" name="semester_id" value="<?= $row2['semester_id'] ?>">
                    <input required type="hidden" name="pre_subject_id" value="<?= $row2['pre_subject_id'] ?>">
                    <input required type="hidden" name="student_id" value="<?= $student_data->student_id ?>">
                    <input required type="hidden" name="subject_unit" value="<?= $row2['subject_unit'] ?>">
                    <input required type="hidden" name="max_units" value="<?= $student_units ?>">
                    <input required type="hidden" name="ctr" value="<?= $ctr ?>">
                    <button type="submit" name="add_subject" class="btn btn-flat btn-sm btn-success" value="<?= $row2['subject_id'] ?>"><i class="fa fa-plus"></i></button>
                  </form>
                <?php } ?>
              </td>
            </tr>
            <?php
            // $unit_ctr += $row2['subject_unit'];
            // $subjects[] = $row2['subject_id'];
            // $presubjects[] = $row2['pre_subject_id'];
            ?>
          <?php }  ?>
        <?php }  ?>

      </tbody>
    </table>
  <?php } ?>

  <?php
  /*
   if (isset($_GET['load_subjects']) && $student_data->confirmed) { ?>
    <table class="recommendation-table">
      <h2>Recommendation</h2>
      <thead>
        <tr>
          <th>Course Code</th>
          <th>Course Title</th>
          <th>Units</th>
          <th>Class Type</th>
          <th>Pre-requisite</th>
          <th>Feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach (get_list("SELECT s2.subject_code as pre_subject_code,s2.subject_title as pre_subject_title,s.*,ct.*,cd.* from recommended_subjects_tbl cd  left join subject_tbl s2 on s2.subject_id = cd.pre_subject_id inner join subject_tbl s on s.subject_id = cd.subject_id inner join year_levels_tbl y on y.year_id = cd.year_id inner join semester_tbl ss on ss.semester_id = cd.semester_id inner join class_type_tbl ct on ct.class_type_id = s.class_type_id where cd.student_id = '" .  $student_data->student_id . "' AND y.year_id <= '" . $student_data->year_id . "' AND ss.semester_id = '" . $student_data->semester_id . "' ORDER BY y.year_id,ss.semester_id") as $row2) {
          if ($unit_ctr >= $student_units) {
            continue;
          }
        ?>
          <?php if (in_array($row2['subject_id'], $subjects)) { ?>
            <tr>

              <td><?= $row2['subject_code'] ?></td>
              <td><?= $row2['subject_title'] ?></td>
              <td><?= $row2['subject_unit'] ?></td>
              <td><?= $row2['class_type_name']  ?></td>
              <td><?= !empty($row2['pre_subject_code']) ? $row2['pre_subject_code'] . " (" . $row2['pre_subject_title'] . ")" : "NONE" ?></td>

              <td>
                <form method="POST">

                  <div class="input required-group input required-group">
                    <input required type="hidden" name="recommended_subject_id" value="<?= $row2['recommended_subject_id'] ?>">
                    <textarea name="feedback" id="" class="form-control"><?= $row2['feedback'] ?></textarea>
                    <button type="submit" class="btn btn-primary btn-flat btn-sm">Save</button>
                  </div>


                </form>
              </td>
            </tr>
            <?php
            $unit_ctr += $row2['subject_unit'];
            $subjects[] = $row2['subject_id'];
            $presubjects[] = $row2['pre_subject_id'];
            ?>
          <?php }  ?>
        <?php }  ?>

      </tbody>
    </table>
  <?php } */ ?>
  <div class="button-container">
    <form method="get">
      <input required type="hidden" name="save_subjects" value="1">
      <input required type="hidden" name="id" value="<?= $_GET['id'] ?>">
      <input required type="hidden" name="load_subjects" value="1">
      <input required type="hidden" name="student_id" value="<?= $student_data->student_id  ?>">
      <input required type="hidden" name="curriculum_id" value="<?= $student_data->curriculum_id  ?>">
      <input required type="hidden" name="subjects" value="<?= implode(',', $subjects) ?>">
      <input required type="hidden" name="presubjects" value="<?= implode(',', $presubjects) ?>">
      <input required type="hidden" name="year_id" value="<?= $student_data->year_id ?>">
      <input required type="hidden" name="semester_id" value="<?= $student_data->semester_id ?>">
      <button class="btn" type="submit">Save Subjects</button>
      <button class="btn" type="button" onclick="printData()">Print</button>
    </form>
  </div>
</div>



<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="modal-add-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-create-content">
      <div class="modal-header bg-primary text-white">
        <div class="row w-100 justify-content-between align-items-center">
          <div class="col">
            <h4 class="modal-title" id="modal-add-title">Add Subject</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input required type="hidden" name="create" value="1">
        <input required type="hidden" name="student_id" value="<?= $_GET['id'] ?>">

        <div class="modal-body">
          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Year:</label>
              <select name="year_id" id="year_id" class="form-control">
                <?php foreach (get_list("SELECT * from year_levels_tbl  where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['year_id'] ?>"><?= $row['year_name'] ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Semester:</label>
              <select name="semester_id" id="semester_id" class="form-control">
                <?php foreach (get_list("SELECT * from semester_tbl  where deleted_flag = 0") as $row) { ?>
                  <option value="<?= $row['semester_id'] ?>"><?= $row['semester_name'] ?> </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course:</label>
              <select name="subject_id" id="subject_id" class="form-control">
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Co/Prerequisite:</label>
              <select name="pre_subject_id" id="pre_subject_id" class="form-control">
                <option value="0">NONE</option>
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
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
<div class="modal fade" id="modal-create-recommendation" tabindex="-1" role="dialog" aria-labelledby="modal-add-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-create-content">
      <div class="modal-header bg-primary text-white">
        <div class="row w-100 justify-content-between align-items-center">
          <div class="col">
            <h4 class="modal-title" id="modal-add-title">Add Subject</h4>
          </div>
          <div class="col-auto">
          </div>
        </div>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <input required type="hidden" name="create_recommendation" value="1">
        <input required type="hidden" name="student_id" value="<?= $_GET['id'] ?>">
        <input required type="hidden" name="year_id" value="<?= $student_data->year_id ?>">
        <input required type="hidden" name="semester_id" value="<?= $student_data->semester_id ?>">

        <div class="modal-body">


          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Course:</label>
              <select name="subject_id" id="subject_id" class="form-control">
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="department-course" class="font-weight-bold">Co/Prerequisite:</label>
              <select name="pre_subject_id" id="pre_subject_id" class="form-control">
                <option value="0">NONE</option>
                <?php foreach (get_list("SELECT cc.*,s.* from subject_tbl s inner join class_type_tbl cc on cc.class_type_id = s.class_type_id where s.deleted_flag = 0 and s.program_id = " . $data->program_id) as $row) { ?>
                  <option value="<?= $row['subject_id'] ?>"><?= $row['subject_code'] ?> (<?= $row['subject_title'] ?>) | <?= $row['class_type_name'] ?> | <?= $row['subject_unit'] ?> Units </option>
                <?php } ?>
              </select>
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
<script>
  function printData() {
    // Get the HTML of the table and the additional div
    var tableContent = document.getElementById("printTable").innerHTML;
    var additionalContent = document.getElementById("main-content").innerHTML;

    // Get the HTML of the whole page
    var oldPage = document.body.innerHTML;

    // Include the specified links in the dynamically created HTML
    document.body.innerHTML =
      `
      <html>
      <head>
        <title>Print</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/recommendation.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
        <link rel="stylesheet" href="../../evaluation.css">
               <style>
          @media print {
            table td:last-child {
              display: none;
            }
          }
        </style>
      </head>
      <body>
        <div style='padding: 0px 101px'>${additionalContent}</div>
        ${tableContent}
      </body>
      </html>
      `;

    // Print the page
    window.print();

    // Restore the original HTML
    document.body.innerHTML = oldPage;
  }
</script>
<?php
include_once('footer.php');

?>