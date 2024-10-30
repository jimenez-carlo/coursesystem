<?php
if (isset($_GET["curriculum_id"])) {
    $curriculum_id = $_GET["curriculum_id"];

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

    $sql = "DELETE FROM curriculum_tbl WHERE curriculum_id=$curriculum_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location:/coursesystem/pages/educational_program/curriculum/curriculum.php");
    exit;
} else {
    echo "Subject ID is not provided";
}
