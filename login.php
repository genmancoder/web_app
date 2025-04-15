<?php
// Define the valid username and password
$valid_username = "user123";
$valid_password = "pass123";

// Retrieve the submitted username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Validate the username and password
if ($username === $valid_username && $password === $valid_password) {
    $message = "Login successful. Welcome, $username!";
} else {
    $message = "Login failed. Please check your username and password.";
}

// Display the login message
echo "<h2>Login Status</h2>";
echo "<p>$message</p>";
?>
