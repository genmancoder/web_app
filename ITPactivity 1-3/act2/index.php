<?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

$number = 20;
echo "Factorial of $number is: " . factorial($number) . "<br>";

$studentNames = array("Elton", "Cristy", "Noemel");
foreach ($studentNames as $name) {
    echo $name . "<br>";
}

?>
