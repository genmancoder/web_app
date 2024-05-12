<?php 

$file = '../data.txt';
if (!file_exists($file)) {
    fopen($file, 'w');
    echo "file created";
}