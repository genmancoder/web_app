<?php
require_once 'db.php';

// Query to select all products
$query = "SELECT * FROM Products";
$result = mysqli_query($conn, $query);

if ($result) {
    // Check if any products are returned
    if (mysqli_num_rows($result) > 0) {
        // Output table headers
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
              </thead>";
        
        // Output product data in HTML table rows
        echo "<tbody>";
        while ($product = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $product['ID'] . "</td>";
            echo "<td>" . $product['Name'] . "</td>";
            echo "<td>" . $product['Description'] . "</td>";
            echo "<td>" . $product['Price'] . "</td>";
            echo "<td>" . $product['Quantity'] . "</td>";
            echo "<td>" . $product['Category'] . "</td>";
            echo "<td class='btn-group'>
                    <button class='edit-product'>Edit</button>
                    <button class='delete-product'>Delete</button>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody>";
    } else {
        // If no products found
        echo "<tr><td colspan='7'>No products found</td></tr>";
    }
} else {
    // If query execution failed
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>