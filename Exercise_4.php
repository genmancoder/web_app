<!DOCTYPE html>
<html>
<head>
    <title>Data Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            display: flex; 
            justify-content: center; 
            flex-direction: row-reverse;

        }
        .column {
            flex: 1; 
            padding: 0 10px; 
        }
        h2 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }
        form {
            margin-bottom: 20px;
            text-align: left; 
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="column">
        <h2>Add New Data</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="column">
        <h2>Current Data</h2>
        <?php
        $dataFile = "data.txt";

        function displayData($file) {
            if ($file) {
                echo "<ul>";
                while (($line = fgets($file)) !== false) {
                    echo "<li>" . htmlspecialchars($line) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "Error opening file.";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['occupation']) &&
                !empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['occupation'])) {
                $file = fopen($dataFile, "a");
                if ($file) {
                    $name = htmlspecialchars($_POST['name']);
                    $age = htmlspecialchars($_POST['age']);
                    $occupation = htmlspecialchars($_POST['occupation']);
                    fwrite($file, "$name\t$age\t$occupation\n"); 
                    fclose($file);
                } else {
                    echo "Error opening file.";
                }
            } else {
                echo "Please fill out all fields.";
            }
        }

        $file = fopen($dataFile, "r");
        displayData($file);
        fclose($file);
        ?>
    </div>
</div>

</body>
</html>
