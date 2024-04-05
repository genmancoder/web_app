<!-- login_form.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="act3.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

<!-- login.php -->
<?php
// Define valid username and password for demonstration
$validUsername = "user";
$validPassword = "password";

// Retrieve submitted username and password from the form
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validate the submitted username and password
if ($username === $validUsername && $password === $validPassword) {
    echo "Login successful!";
} else {
    echo "Login failed. Please check your username and password.";
}

?>





