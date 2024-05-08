<?php

function displayData() {
    $file = fopen("data.txt", "r") or die("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    fclose($file);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $data = $name . "," . $age . "\n";
    $file = fopen('data.txt', 'a');
    fwrite($file, $data);
    fclose($file);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Display Data</h2>
<?php displayData(); ?>

<h2>Add New Data</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name:<br>
    <input type="text" name="name"><br>
    Age:<br>
    <input type="text" name="age"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
