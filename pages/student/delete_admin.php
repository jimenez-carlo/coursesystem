<?php
if (isset($_GET["admin_id"])) {
    $admin_id = $_GET["admin_id"];

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

    $sql = "DELETE FROM admin_tbl WHERE admin_id=$admin_id";

    if ($conn->query($sql) === TRUE) {
        // No need to echo here
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: /coursesystem/pages/admin/admin.php");
    exit;
} else {
    echo "Admin ID is not provided";
}
?>
