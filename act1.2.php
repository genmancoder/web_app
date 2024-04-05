<?php
function determineAgeGroup($age) {
    if ($age >= 0 && $age < 18) {
        return "minor";
    } elseif ($age >= 18 && $age < 60) {
        return "adult";
    } else {
        return "senior citizen";
    }
}

if(isset($_POST['age'])) {
    $userAge = intval($_POST['age']); 

    $ageGroup = determineAgeGroup($userAge);

    echo "You are a ".$ageGroup.".";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Age Group Checker</title>
</head>
<body>
    <h2>Enter Your Age</h2>
    <form method="post" action="">
        <input type="text" name="age" placeholder="Enter your age">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
