<?php 

$file = '../data.txt';
if (!file_exists($file)) {
    fopen($file, 'w');
    echo "file created";
}else{
    echo "File existed. Delete if you want to create a new.";
}