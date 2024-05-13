<?php
function determineAge($age) {
    if ($age < 18) {
        return "minor";
    } elseif ($age >= 18 && $age < 60) {
        return "adult";
    } else {
        return "senior citizen";
    }
}
    $stringVariable = "Hello";
    $intVariable = 10;
    $floatVariable = 3.14;
    $booleanVariable = true;

    echo $stringVariable . "World! <br>";

    $result1 = $intVariable + $floatVariable;
    $result2 = $floatVariable - $intVariable;
    $result3 = $intVariable * $floatVariable;
    $result4 = $intVariable / $floatVariable;

    echo "Arithmethic Results: <br>";
    echo "Result of addition: " . $result1 . "<br>";
    echo "Result of subtraction: " . $result2 . "<br>";
    echo "Result of multiplication: " . $result3 . "<br>";
    echo "Result of division: " . $result4 . "<br>";
    echo"----------------------------------------------<br>";



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["age"])) {
    $age = $_POST["age"];

    $ageCategory = determineAge($age);

    echo "<h1>You are a $ageCategory.</h1>";
}

?>