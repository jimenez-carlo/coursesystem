<?php
if (isset($_GET["code_id"])) {
    $code_id = $_GET["code_id"];

    // Validate that code_id is a valid integer
    if (!is_numeric($code_id)) {
        die("Invalid Subject ID.");
    }

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

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM subject_tbl WHERE code_id = ?");
    
    if ($stmt) {
        $stmt->bind_param("i", $code_id); // "i" means the parameter is an integer

        // Execute the prepared statement
        if ($stmt->execute() === TRUE) {
            // Successful deletion; redirect to the specified page
            header("Location: /coursesystem/pages/educational_program/subject/subject.php");
            exit;
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Subject ID is not provided";
}
?>
