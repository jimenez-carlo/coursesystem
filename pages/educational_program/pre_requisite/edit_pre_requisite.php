<?php
require_once('../../../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $pre_requisite_id = $_POST["pre_requisite_id"];
    $sub_name = $_POST["sub_name"];
    $sub_title = $_POST["sub_title"];
    $sub_pre_requisite = $_POST["sub_pre_requisite"];

    // Update the department details in the database
    $sql = "UPDATE pre_requisite_tbl SET
            sub_name = '$sub_name',
            sub_title = '$sub_title',
            sub_pre_requisite = '$sub_pre_requisite'
            WHERE pre_requisite_id = '$pre_requisite_id'";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Department updated successfully."); window.location.href="pre_requisite.php";</script>';
    } else {
        echo '<script>alert("Error updating department."); window.location.href="pre_requisite.php";</script>' . $conn->error;
    }
} else {
    $department_id = $_GET['id'];

    $sql_select = "SELECT * FROM pre_requisite_tbl WHERE pre_requisite_id = '$pre_requisite_id'";
    $select_query = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($select_query);
    $sub_name = $row['sub_name'];
    $sub_title = $row['sub_title'];
    $sub_pre_requisite = $row['sub_pre_requisite'];
}

$conn->close();
?>
