<?php
include "connection.php"; // Include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM incoming WHERE id = ?");
    $stmt->bind_param("s", $id); // Assuming 'id' is a string

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();
}

header('location: incoming.php');
exit;
?>
