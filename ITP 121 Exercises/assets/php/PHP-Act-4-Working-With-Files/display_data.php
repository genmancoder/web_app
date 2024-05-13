<?php
// Open the file for reading
$file = fopen("data.txt", "r");

// Read the file line by line and display contents
echo "<h2>Updated Contents of data.txt:</h2>";
while (!feof($file)) {
    echo fgets($file) . "<br>";
}

// Close the file
fclose($file);
?>