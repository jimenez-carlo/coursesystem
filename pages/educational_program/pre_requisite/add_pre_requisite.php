<?php
include("../../../conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sub_name = mysqli_real_escape_string($conn, $_POST['sub_name']);
    $sub_title = mysqli_real_escape_string($conn, $_POST['sub_title']);
    $sub_pre_requisite = mysqli_real_escape_string($conn, $_POST['sub_pre_requisite']);


    // Use prepared statements to prevent SQL injection
    $sql_insert = "INSERT INTO pre_requisite_tbl (sub_name, sub_title, sub_pre_requisite) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sss", $sub_name, $sub_title, $sub_pre_requisite);

    // Execute the statement
    $insert_query = mysqli_stmt_execute($stmt);

    // Check for errors
    if (!$insert_query) {
        die('Query Error: ' . mysqli_stmt_error($stmt));
    }

    header("Location: pre_requisite.php");
    exit();
}


