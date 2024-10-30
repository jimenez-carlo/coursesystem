<?php
if (isset($_GET["student_id"])) {
    $student_id = $_GET["student_id"];

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

    $sql = "DELETE FROM student_tbl WHERE student_id=$student_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location:/coursesystem/pages/student/student.php");
    exit;
} else {
    echo "Subject ID is not provided";
}

?>
