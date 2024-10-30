<?php
if (isset($_GET["year_id"])) {
    $year_id = $_GET["year_id"];

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

    $sql = "DELETE FROM year_levels_tbl WHERE year_id=$year_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: /coursesystem/pages/yearlevel/yearlevel.php");
    exit;
} else {
    echo "Year Level ID is not provided";
}
?>
