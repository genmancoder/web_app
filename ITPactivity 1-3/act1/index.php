<?php


$stringVar = "Hello";
$integerVar = 40;
$floatVar = 32.1;
$booleanVar = true;

$sum = $integerVar + $floatVar;
$difference = $integerVar - $floatVar;
$product = $integerVar * $floatVar;
$quotient = $integerVar / $floatVar;

echo "Sum: $sum <br>";
echo "Difference: $difference <br>";
echo "Product: $product <br>";
echo "Quotient: $quotient <br>";


function determineAgeGroup($age) {
    if ($age < 18) {
        return "You are a minor.";
    } elseif ($age >= 18 && $age < 60) {
        return "You are an adult.";
    } else {
        return "You are a senior citizen.";
    }
}


$userAge = isset($_POST['age']) ? intval($_POST['age']) : 0;

echo determineAgeGroup($userAge);

?>
