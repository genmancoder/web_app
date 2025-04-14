<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Color Gradient</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content {
            text-align: center;
            padding: 50px;
            color: white;
            border-radius: 8px;
            background-color: rgba(0, 0, 0, 0.7); 
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="content">
        <?php
        function factorial($n) {
            if ($n <= 1) {
                return 1;
            } else {
                return $n * factorial($n - 1);
            }
        }
        $number = rand(1, 10);
        $factorialResult = factorial($number);
        echo "<h1>Factorial of $number is: $factorialResult</h1>";
        
        $students = array("Jerahmeel", "Eshrafel", "Jareth", "Zheff", "Agnaram","Apam","Alisan","Novie","Lods");

        echo "<h2>Student Names:</h2>";
        foreach ($students as $student) {
            echo "<p>$student</p>";
        }
        ?>
    </div>
</body>
</html>
