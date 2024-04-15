<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = "Admin";
    $password = "Admin123";

    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    if ($input_username === $username && $input_password === $password) {
        echo "Login Successful!";
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>