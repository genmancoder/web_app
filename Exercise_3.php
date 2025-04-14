<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #34495e; 
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5); 
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #ecf0f1;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
            color: #ecf0f1;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #bdc3c7; 
            margin-bottom: 10px;
            width: 250px;
            background-color: #ecf0f1; 
        }
        button {
            background-color: #3498db; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9; 
        }
        .message {
            margin-top: 20px;
            color: #ecf0f1;
        }
        .success {
            color: #2ecc71; 
        }
        .error {
            color: #e74c3c; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Dummy username and password for validation
            $valid_username = "admin";
            $valid_password = "admin";
            
            // Retrieve username and password from the form
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Validate login
            if ($username === $valid_username && $password === $valid_password) {
                echo "<p class='message success'>Login successful! Welcome, $username!</p>";
            } else {
                echo "<p class='message error'>Login failed. Please check your username and password.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
