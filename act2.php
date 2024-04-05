<?php
function factorial($no) {
    if ($no === 0 || $no === 1) {
        return 1;
    } else {
        return $no * factorial($no - 1);
    }
}

$number = 5;
echo "Factorial of $number is " . factorial($number);
?>
