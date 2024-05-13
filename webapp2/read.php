<?php
include 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    echo "<h2>Users Information</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. "<br>";
        echo "Username: " . $row["Username"]. "<br>";
        echo "Email: " . $row["Email"]. "<br>";
        echo "Password: " . $row["Password"]. "<br>";
        echo "Role: " . $row["Role"]. "<br>";
        echo "Registration_Date: " . $row["Registration_Date"]. "<br>";
    }
}

$conn->close();
?>
