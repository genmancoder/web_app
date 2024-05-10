<?php
include 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username'])) {
        $search_username = mysqli_real_escape_string($conn, $_POST['username']);

        $sql = "SELECT * FROM users WHERE username = '$search_username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>User Information</h2>";
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"]. "<br>";
                echo "Username: " . $row["username"]. "<br>";
                echo "Email: " . $row["email"]. "<br>";
            }
        } else {
            echo "No user found with the entered username.";
        }
    } else {
        echo "Form data not submitted properly.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Users</title>
</head>
<body>
    <h2>Read Users</h2>
    <form action="read.php" method="post">
        <label for="username">Enter Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <input type="submit" value="Search">
    </form>
</body>
</html>