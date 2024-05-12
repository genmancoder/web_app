<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Data</title>
<link rel="stylesheet" href="assets/style.css">
<style>
</style>
</head>
<body>

<h1>Add User</h1>

<div class="container">
    <div class="left">
        <form action="controller/add_data.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age"><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="right">
        <?php
        $file = 'data.txt';
        $handle = fopen($file, 'r');
        echo '<table>';
        echo '<tr><th>Name</th><th>Age</th><th>Address</th></tr>';

        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $data = explode(', ', $line);
                echo '<tr>';
                foreach ($data as $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
            fclose($handle);
        } else {
            echo "<tr><td colspan='3'>Error opening the file.</td></tr>";
        }

        echo '</table>';
        ?>
    </div>
</div>

</body>
</html>
