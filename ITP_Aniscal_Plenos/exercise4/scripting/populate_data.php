<?php 
$file = '../data.txt';
generateData($file);

function generateData($file){
    $generate_dataset = [
        [
            'James Reid', 
            30, 
            'ABC XYZ Philippines'
        ],
        [
            'Paul George', 
            58, 
            'ABC XYZ America'
        ],
        [
            'Sakuragi', 
            30, 
            'ABC XYZ Japan'
        ]
        
    ];
    $handle = fopen($file, 'w');
    foreach($generate_dataset  as $data){
        fwrite($handle, implode(', ', $data). "\n");
    }
    
    fclose($handle);
    
    echo 'data sets generated and written to data.txt.';
}