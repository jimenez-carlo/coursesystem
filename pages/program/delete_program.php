<?php
if (isset($_GET["program_id"])) {
    $program_id = $_GET["program_id"];

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

    $sql = "DELETE FROM program_tbl WHERE program_id=$program_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: /coursesystem/pages/program/program.php");
    exit;
} else {
    echo "Program ID is not provided";
}
?>
