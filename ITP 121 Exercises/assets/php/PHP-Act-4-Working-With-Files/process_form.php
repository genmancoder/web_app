<?php
// Get form data
$name = $_POST['name'];
$age = $_POST['age'];

// Open the file for appending
$file = fopen("data.txt", "a");

// Append new data to the file with a newline character
fwrite($file, "$name,$age\n");

// Close the file
fclose($file);

// Redirect back to the page displaying data
header("Location: display_data.php");
?>