<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif; 
            background-color: #808080; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #f0f0f0;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 500px; 
            width: 80%; 
        }
        h2 {
            margin-bottom: 30px;
            color: #222; 
            font-family: Arial, sans-serif; 
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 15px; 
            color: #333; 
            font-family: Arial, sans-serif; 
        }
        input[type="text"],
        input[type="password"] {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px; 
            width: 300px; 
        }
        button {
            background-color: #4B0082; 
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif; 
        }
        button:hover {
            background-color: #800080; 
        }
        .message {
            margin-top: 20px;
            color: #333; 
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form method="post">
            <label for="new_username">Username:</label>
            <input type="text" id="new_username" name="new_username" required> 
            <label for="new_password">Password:</label> 
            <input type="password" id="new_password" name="new_password" required> 
            <button type="submit">Login</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $valid_username = "nadine";
            $valid_password = "canas";
            
            $new_username = $_POST['new_username'];
            $new_password = $_POST['new_password']; 
            
            if ($new_username === $valid_username && $new_password === $valid_password) { 
                echo "<p class='message success'>Login successful! Welcome, $new_username!</p>"; 
            } else {
                echo "<p class='message error'>Login failed. Please check your username and password.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
