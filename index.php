<!DOCTYPE html>
<html>
<head>
    <title>Data Management</title>
</head>
<body>
    <?php
    // Function to display existing data
    function displayExistingData() {
        // Open the data.txt file for reading
        $file = fopen("data.txt", "r");

        // Read the contents line by line and display them
        echo "<h2>Existing Data:</h2>";
        while (!feof($file)) {
            $line = fgets($file);
            echo $line . "<br>";
        }

        // Close the file
        fclose($file);
    }

    // Function to process form submission and add new data
    function processFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $age = $_POST["age"];

            // Open the data.txt file for appending
            $file = fopen("data.txt", "a");

            // Append the new data to the file
            fwrite($file, "$name, $age\n");

            // Close the file
            fclose($file);

            // Redirect back to the main page to avoid form resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    // Check if form is submitted, if so, process the submission
    processFormSubmission();

    // Display existing data
    displayExistingData();
    ?>

    <!-- HTML form for adding new data -->
    <h2>Add New Data:</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
