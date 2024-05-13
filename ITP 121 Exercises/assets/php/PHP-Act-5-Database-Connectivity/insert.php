<?php
include 'connection.php'; // Include the connection script

// Insert data into users table
$sql = "INSERT INTO users (username, email) VALUES ('JohnDoe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>