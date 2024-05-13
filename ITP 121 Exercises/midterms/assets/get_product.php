<?php
// Include your database connection file
include 'db.php';

// Check if productId is provided and is a valid integer
if (isset($_POST['productId']) && is_numeric($_POST['productId'])) {
    // Sanitize the input to prevent SQL injection
    $productId = intval($_POST['productId']);

    // Prepare and execute the SQL query to fetch product details
    $query = "SELECT * FROM products WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the product details
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Return product details as JSON response
        echo json_encode($product);
    } else {
        // If no product found, return an error message
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    // If productId is not provided or not valid, return an error message
    echo json_encode(['error' => 'Invalid product ID']);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>