<?php
if (isset($_GET["department_id"])) {
    $department_id = $_GET["department_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "coursesystem";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM department_tbl WHERE department_id=$department_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: /coursesystem/pages/department/department.php");
    exit;
} else {
    echo "Department ID is not provided";
}
?>
