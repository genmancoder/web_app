<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    // Prepare SQL statement
    $sql = "UPDATE Products SET Name = '$name', Description = '$description', Price = '$price', Quantity = '$quantity', Category = '$category' WHERE ID = $productId";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Product updated successfully";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>