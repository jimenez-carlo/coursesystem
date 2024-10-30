<?php
if (isset($_GET["sem_id"])) {
    $sem_id = $_GET["sem_id"];

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

    $sql = "DELETE FROM semester_tbl WHERE sem_id=$sem_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: /coursesystem/pages/semester/semester.php");
    exit;
} else {
    echo "Semester ID is not provided";
}
?>
