<?php
include 'connection.php'; // Include the connection script

// Update data in users table
$sql = "UPDATE users SET username='UpdatedName' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>