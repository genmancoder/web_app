<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];

    try {
        // Prepare SQL statement
        $sql = "DELETE FROM Products WHERE ID = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameter
        $stmt->bind_param('i', $productId);

        // Execute the statement
        $stmt->execute();

        echo "Product deleted successfully";
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>