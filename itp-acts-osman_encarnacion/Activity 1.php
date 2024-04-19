<?php
$stringVar = "Hello";
$integerVar = 10;
$floatVar = 5.5;
$booleanVar = true;

$result1 = $integerVar + $floatVar; 
$result2 = $floatVar - $integerVar; 
$result3 = $integerVar * $floatVar; 
$result4 = $integerVar / $floatVar; 


echo "Result 1 (Addition): " . $result1 . "<br>";
echo "Result 2 (Subtraction): " . $result2 . "<br>";
echo "Result 3 (Multiplication): " . $result3 . "<br>";
echo "Result 4 (Division): " . $result4 . "<br>";

$booleanToInt = (int)$booleanVar;

echo "Boolean to Integer: " . $booleanToInt;
?>
