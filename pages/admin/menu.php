   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     <li class="nav-item">
       <a href="index.php" class="nav-link <?= activate(array("index")) ?>">
         <i class="nav-icon fas fa-home"></i>
         <p>
           Home
         </p>
       </a>
     </li>
     <li class="nav-item">
       <a href="department.php" class="nav-link <?= activate(array("department")) ?>">
         <i class="fa-solid fa-chalkboard-user"></i>
         <p>
           Department
         </p>
       </a>
     </li>
     <li class="nav-item <?= activate2(array("course", "curriculum", "program", "program_category")) ?>">
       <a href="#" class="nav-link">
         <i class="fa-solid fa-chalkboard-user"></i>
         <p>
           Educational Program
           <i class="right fas fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">
         <li class="nav-item">
           <a href="program_category.php" class="nav-link <?= activate(array("program_category")) ?>">
             <i class="fas fa-book nav-icon"></i>
             <p>
               Category
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="program.php" class="nav-link <?= activate(array("program")) ?>">
             <i class="fas fa-book nav-icon"></i>
             <p>
               Program
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="course.php" class="nav-link <?= activate(array("course")) ?>">
             <i class="fas fa-book nav-icon"></i>
             <p>Course</p>
           </a>
         </li>
         <li class="nav-item ">
           <a href="curriculum.php" class="nav-link <?= activate(array("curriculum")) ?>">
             <i class="fas fa-book nav-icon"></i>
             <p>Curriculum</p>
           </a>
         </li>
       </ul>
     </li>

     <li class="nav-item  <?= activate2(array("user_admin", "student")) ?>">
       <a href="#" class="nav-link">
         <i class="nav-icon fas fa-users"></i>
         <p>
           Users
           <i class="right fas fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">
         <li class="nav-item">
           <a href="user_admin.php" class="nav-link <?= activate(array("user_admin")) ?>">
             <i class="fa-solid fa-user-tie"></i>
             <p>Admin</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="student.php" class="nav-link <?= activate(array("student")) ?>">
             <i class="fa-solid fa-user-graduate"></i>
             <p>Student
             </p>
           </a>
         </li>

       </ul>
     </li>
     <li class="nav-item <?= activate2(array("config", "year", "semester")) ?>">
       <a href="#" class="nav-link">
         <i class="nav-icon fas fa-cogs"></i>
         <p>
           Config
           <i class="right fas fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">

         <li class="nav-item">
           <a href="year.php" class="nav-link <?= activate(array("year")) ?>">
             <i class="nav-icon fas fa-cog"></i>
             <p>
               Year Level
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="semester.php" class="nav-link <?= activate(array("semester")) ?>">
             <i class="nav-icon fas fa-cog"></i>
             <p>
               Semester
             </p>
           </a>
         </li>
       </ul>
     </li>
     <li class="nav-item">
       <a href="../../logout.php" class="nav-link logoutLink">
         <i class="nav-icon fas fa-sign-out-alt"></i>
         <p>
           Logout
         </p>
       </a>
     </li>
     </li>
     </li>
   </ul>