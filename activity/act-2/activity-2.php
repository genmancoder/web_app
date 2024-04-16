<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Act-2-Functions and Arrays</title>
</head>
<body>
    
<?php 
    $amount = 3;
    $outcome = factorial($amount);
    function factorial($num) {
        if ($num <= 0) {
            return 1;
        } else {
            return $num * factorial($num - 1);
        }
    }
    echo "-----------------------------------"."<br>";
    echo "Factorial of $amount is: $outcome"."<br>";
    echo "-----------------------------------"."<br>";

    
    echo "THE STUDENTS NAME ARE: "."<br>";
    echo "-----------------------------------"."<br>";
    $studentNames = array("Jashley", "Janisa", "Jeanelyn","Hannielene" ,"Joenamie");
    foreach ($studentNames as $key => $name) {
        
        echo "Student " . ($key + 1) . ": " . $name . "<br>";
    }
    echo "-----------------------------------"."<br>";
?>

</body>
</html>
