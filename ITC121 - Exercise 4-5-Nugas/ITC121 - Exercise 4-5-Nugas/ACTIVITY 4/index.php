<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Name and Age</title>
    <link rel="stylesheet" href="style.css"/> 
</head>
<body>
    <div class="container">
        <h2>Add Name and Age</h2>
        <form action="index.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>

<?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];

        $file = fopen("sample_data.txt", "a"); 
        if ($file) {
            $line = $name . ", " . $age . "\n"; 
            fwrite($file, $line);
            fclose($file);
        } else {
            echo "Error opening file!";
        }
    }

    $file2 = fopen("sample_data.txt", "r");
    if ($file2) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Age</th></tr>";
        while (!feof($file2)) {
            $line = fgets($file2);
            $parts = explode(",", $line);
            echo "<tr>";
            foreach ($parts as $part) {
                echo "<td>" . trim($part) . "</td>"; 
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($file2);
    }

?>