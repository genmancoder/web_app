<?php
// Database configuration
$servername = "localhost"; // Change this to your MySQL server host
$username = "root"; // Change this to your MySQL username
$password = "password"; // Change this to your MySQL password
$database = "mydatabase"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD Operations

// Create operation
function createUser($username, $email) {
    global $conn;
    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
    if ($conn->query($sql) === TRUE) {
        return "New record created successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read operation
function getUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

// Update operation
function updateUser($id, $username, $email) {
    global $conn;
    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Record updated successfully";
    } else {
        return "Error updating record: " . $conn->error;
    }
}

// Delete operation
function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return "Record deleted successfully";
    } else {
        return "Error deleting record: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
