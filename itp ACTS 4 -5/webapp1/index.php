<form action="" method="post">
<label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname"><br><br>
        
        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname"><br><br>
        
        <label for="middlename">Middle Name:</label><br>
        <input type="text" id="middlename" name="middlename"><br><br>

        <label for="gender">Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br><br>
        
        <input type="submit" value="Submit">    
</form>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $file = fopen("data.txt", "a"); // Open the file in append mode
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $middlename = $_POST["middlename"];
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
        $txt = "First Name: $firstname\nLast Name: $lastname\nMiddle Name: $middlename\nGender: $gender\n\n";
        fwrite($file, $txt); // Append the new data to the file
        fclose($file);
        echo "<p>Data has been saved successfully.</p>";
        echo "<p>$txt</p>";
    }
?>