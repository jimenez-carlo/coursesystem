<?php
require_once('../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $department_id = $_POST["department_id"];
    $department_name = $_POST["department_name"];
    $department_mobilenum = $_POST["department_mobilenum"];
    $department_status = $_POST["department_status"];

    // Update the department details in the database
    $sql = "UPDATE department_tbl SET
            department_name = '$department_name',
            department_mobilenum = '$department_mobilenum',
            department_status = '$department_status'
            WHERE department_id = '$department_id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Department updated successfully."); window.location.href="department.php";</script>';
    } else {
        echo '<script>alert("Error updating department."); window.location.href="department.php";</script>' . $conn->error;
    }
} else {
    $department_id = $_GET['id'];

    $sql_select = "SELECT * FROM department_tbl WHERE department_id = '$department_id'";
    $select_query = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($select_query);
    $curriculum_name = $row['curriculum_name'];
    $curriculum_course = $row['curriculum_course'];
    $curriculum_year = $row['curriculum_year'];
}

$conn->close();
?>
