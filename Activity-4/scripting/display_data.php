<?php 
$file = '../data.txt';
displayData($file);

function displayData($file){
    $handle = fopen($file, 'r');
    echo '<h3>Users</h3>';
    if ($handle) {
        while (($line = fgets($handle)) != false){
            echo $line. "<br>";
        }
    }else{
        echo "Issue opening the file";
    }
}