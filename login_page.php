<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <?php
    
    $validUsername = "user123";
    $validPassword = "password123";
    
    $message = "";

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === $validUsername && $password === $validPassword){
            $message = "Login successful! Welcome, $username!";
        } else {
            $message = "Invalid username or password. Please try again.";
        }
    }
    ?>

    <h2>Login Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Login"></td>
            </tr>
        </table>
    </form>

    <?php
    echo "<p>$message</p>";
    ?>
</body>
</html>
