<?php
$file = '../data.txt';
addData($file);
function addData($file){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $name = $_POST['name'];
       $age = $_POST['age'];
       $address = $_POST['address'];

       $handle = fopen($file, 'a');
       fwrite($handle, "$name, $age, $address\n");
       fclose($handle);
    }
    echo "data added";
    header("Location: ../index.php");
    exit();
}