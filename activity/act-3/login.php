<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $valid_credentials = [
                "jashley" => "jashley20",
                "admin" => "admin123"
            ];

           // Get username and password from the form
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Validate username and password
        if (isset($valid_credentials[$username]) && $valid_credentials[$username] === $password) {
            echo "<p class='message success'>Login successful! Welcome, $username!</p>";
        } else {
            echo "<p class='message error'>Login failed. Please check your username and password.</p>";
        }
    }
?>    