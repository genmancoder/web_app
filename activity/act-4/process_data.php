<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $age = $_POST["age"];
    $sex = $_POST["sex"];
    $occupation = $_POST["occupation"];

   
    if (empty($name) || empty($age) || empty($sex) || empty($occupation)) {
        echo "ALL FIELDS ARE REQUIRED TO FILL IN.";
    } else {
        // Append the data to the file
        $file = fopen("data.txt", "a") or die("Unable to open file!");
        fwrite($file, "Name: ".$name . "\n" . "Age: ".$age . "\n" . "Sex: ".$sex . "\n" . "Occupation: ".$occupation . "\n\n\n");
        fclose($file);

        echo "SUCCESSFULLY ADDED TO YOUR DATA.<br>";
        
        // Display the updated contents of data.txt
        $file_contents = file_get_contents("data.txt");
        echo "<h2>UPDATED CONTENT OF YOUR DATA</h2>";
        echo nl2br($file_contents);
    }
} else {
    // If the request method is not POST, redirect back to the form page
    header("Location: form.html");
    exit;
}
?>
