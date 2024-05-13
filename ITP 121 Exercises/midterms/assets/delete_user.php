<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];

    try {
        // Prepare SQL statement
        $sql = "DELETE FROM Users WHERE ID = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameter
        $stmt->bind_param('i', $userId);

        // Execute the statement
        $stmt->execute();

        echo "User deleted successfully";
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>