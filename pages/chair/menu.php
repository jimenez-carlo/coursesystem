  <nav class="navbar">
    <a href="chair_home.php">Home</a>
    <div class="dropdown">
      <a href="#" class="dropdown-toggle">Curriculum Checklist</a>
      <div class="dropdown-content">
        <ul>
          <?php foreach (get_list("select * from curriculum_semester_tbl where deleted_flag = 0") as $row) { ?>
            <li class="has-submenu">
              <a href="">S.Y. <?= $row['curriculum_semester_year_from'] ?> - <?= $row['curriculum_semester_year_to'] ?> <i class="bi bi-chevron-right"></i></a>
              <ul class="submenu">
                <?php foreach (get_list("select * from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id where c.deleted_flag = 0 and c.curriculum_semester_id = " . $row['curriculum_semester_id']) as $subrow) { ?>
                  <li class="has-submenu">
                    <a href="#"><?= $subrow['program_code'] ?> (<?= $subrow['program_title'] ?>)</a>
                    <ul class="submenu">
                      <?php foreach (get_list("select * from curriculum_tbl c inner join program_tbl p on p.program_id = c.program_id where c.deleted_flag = 0 and c.curriculum_semester_id = " . $row['curriculum_semester_id']) as $subrow) { ?>
                        <li><a href="chair_checklist.php">1st Semester</a></li>
                        <li><a href="chair_checklist.php">2nd Semester</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                <?php } ?>


              </ul>
            </li>
          <?php } ?>

          <li>
            <a href="">All Year<i class=""></i></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="dropdown">
      <a href="#" class="dropdown-toggle active">Students</a>
      <div class="dropdown-content">
        <ul>
          <li class="has-submenu">
            <a href="">1st Year <i class="bi bi-chevron-right"></i></a>
            <ul class="submenu">
              <li class="has-submenu">
                <a href="#">Data Analytics</a>
                <ul class="submenu">
                  <li><a href="chair_students.php">1st Semester</a></li>
                  <li><a href="chair_students.php">2nd Semester</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#">Web and Mobile Technologies</a>
                <ul class="submenu">
                  <li><a href="chair_students.php">1st Semester</a></li>
                  <li><a href="chair_students.php">2nd Semester</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="has-submenu">
            <a href="">2nd Year <i class="bi bi-chevron-right"></i></a>
            <ul class="submenu">
              <li class="has-submenu">
                <a href="#">Data Analytics</a>
                <ul class="submenu">
                  <<li><a href="chair_students.php">1st Semester</a>
              </li>
              <li><a href="chair_students.php">2nd Semester</a></li>
            </ul>
          </li>
          <li class="has-submenu">
            <a href="#">Web and Mobile Technologies</a>
            <ul class="submenu">
              <li><a href="chair_students.php">1st Semester</a></li>
              <li><a href="chair_students.php">2nd Semester</a></li>
            </ul>
          </li>
        </ul>
        </li>
        <li class="has-submenu">
          <a href="">3rd Year <i class="bi bi-chevron-right"></i></a>
          <ul class="submenu">
            <li class="has-submenu">
              <a href="#">Data Analytics</a>
              <ul class="submenu">
                <li><a href="chair_students.php">1st Semester</a></li>
                <li><a href="chair_students.php">2nd Semester</a></li>
              </ul>
            </li>
            <li class="has-submenu">
              <a href="#">Web and Mobile Technologies</a>
              <ul class="submenu">
                <li><a href="chair_students.php">1st Semester</a></li>
                <li><a href="chair_students.php">2nd Semester</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="has-submenu">
          <a href="">4th Year <i class="bi bi-chevron-right"></i></a>
          <ul class="submenu">
            <li class="has-submenu">
              <a href="#">Data Analytics</a>
              <ul class="submenu">
                <li><a href="chair_students.php">1st Semester</a></li>
                <li><a href="chair_students.php">2nd Semester</a></li>
              </ul>
            </li>
            <li class="has-submenu">
              <a href="#">Web and Mobile Technologies</a>
              <ul class="submenu">
                <li><a href="chair_students.php">1st Semester</a></li>
                <li><a href="chair_students.php">2nd Semester</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="">All Year<i class=""></i></a>
        </li>
        </ul>
      </div>
    </div>
  </nav>