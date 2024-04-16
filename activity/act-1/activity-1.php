<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Act-1-Basic Syntax and Variables,Control Structures</title>
</head>
    <style>
        p{
            color: red;
            font-weight: bold;
        }
    </style>
<body>
    <?php 
        $stringVar = "Jashley";
        $integerVar = 20;
        $floatVar = 1.1;
        $booleanVar = true;

        $a = $floatVar + $integerVar;
        $b = $integerVar * $floatVar;
        $c = $integerVar - $floatVar;
        $d = $integerVar / $floatVar;

        echo "-----------------------------------------------" ."<br>";
        echo "Prepared by: ".$stringVar ." Guiang"."<br>" ;
        echo "-----------------------------------------------" ."<br>";
        
        echo "The Outcome of Performing Arithmetic Operations ". "<br>";
        echo "-----------------------------------------------" ."<br>";
        echo "The Sum: " .$a ."<br>";
        echo "The Product: " .$b ."<br>";
        echo "The Difference: " .$c ."<br>";
        echo "The Quotient: " .$d ."<br>";
        echo "-----------------------------------------------" ."<br>";

    ?>

    <h2>AGE EVALUATION</h2>
    <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Enter your age: <input type="text" name="age">
        <input type="submit" value="Confirm">
    </form>
    </body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST["age"];

        if (!empty($age)) {

            if ($age < 18) {
                $result = "You are a minor.";
            } elseif ($age >= 18 && $age < 60) {
                $result = "You are an adult.";
            } else {
                $result = "You are a senior citizen.";
            }
        } else {
            $result = "ERROR!!" ."<br>" ."Please enter your age.";
        }
    }

    if (isset($result)) {
        echo "<p>{$result}</p>";
    }
         
     ?>
</body>
</html>