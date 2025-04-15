<!DOCTYPE html>
<html>
<head>
    <title>Age Classification</title>
</head>
<body>
    <h2>Age Classification</h2>
    <form method="post">
        <label for="age">Please enter your age:</label><br>
        <input type="text" id="age" name="age"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the age entered by the user
        $userAge = $_POST["age"];

        // Determine user's age group using if-else statements
        if ($userAge < 18) {
            echo "You are a Minor.";
        } elseif ($userAge >= 18 && $userAge < 65) {
            echo "You are an Adult.";
        } else {
            echo "You are a Senior Citizen.";
        }
    }
    ?>
</body>
</html>
