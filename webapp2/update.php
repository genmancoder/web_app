<?php
include 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update.php" method="post">
        <label for="id">User ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="username">New Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="email">New Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
