<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Age Classifier</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace; 
            background: #808080; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px; 
            width: 80%; 
        }
        h2 {
            margin-bottom: 20px;
            font-family: 'Arial Black', sans-serif;
            color: #333; 
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 10px;
            font-family: 'Georgia', serif; 
            color: #555;
        }
        input[type="number"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        button {
            background-color: #708090; 
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Arial', sans-serif;
            width: 100%;
        }
        button:hover {
            background: linear-gradient(45deg, #708090, #808080); 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Age Classifier</h2>
        <form method="post">
            <label for="new_age">Enter your age:</label> 
            <input type="number" id="new_age" name="new_age" required>
            <button type="submit">Submit</button>
        </form>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            $new_age = $_POST['new_age']; 

            if ($new_age < 18) {
                $classification = "minor";
            } elseif ($new_age >= 18 && $new_age < 65) {
                $classification = "adult";
            } else {
                $classification = "senior citizen";
            }
            echo "<p>Your age is $new_age years old. You are classified as a $classification.</p>";
        }
        ?>
    </div>
</body>
</html>
