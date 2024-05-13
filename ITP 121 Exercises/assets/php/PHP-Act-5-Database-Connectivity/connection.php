<?php
$servername = "localhost";
$username = "Jareth";
$password = "Jareth0223";
$dbname = "php-act-5 - database connectivity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>