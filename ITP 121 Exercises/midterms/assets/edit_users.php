<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Prepare SQL statement
    $sql = "UPDATE Users SET Username = '$username', Email = '$email', Password = '$password', Role = '$role' WHERE ID = $userId";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>