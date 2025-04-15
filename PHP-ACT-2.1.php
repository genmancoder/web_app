<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h2>Factorial Calculator</h2>
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="text" id="number" name="number" required>
        <button type="submit">Calculate Factorial</button>
    </form>

    <?php
    // Function to calculate factorial using recursion
    function factorial($n) {
        // Base case: factorial of 0 or 1 is 1
        if ($n == 0 || $n == 1) {
            return 1;
        } 
        // Recursive case: factorial of n is n multiplied by factorial of (n-1)
        else {
            return $n * factorial($n - 1);
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve number from form input
        $number = $_POST["number"];

        // Check if input is a valid integer
        if (!ctype_digit($number) || $number < 0) {
            echo "<p>Please enter a non-negative integer.</p>";
        } else {
            // Calculate factorial
            $result = factorial($number);
            echo "<p>Factorial of $number is: $result</p>";
        }
    }
    ?>
</body>
</html>
