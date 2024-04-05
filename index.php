<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php       
       if(isset($_POST['submit'])){
            
            $firstname = $_POST['name'];
            $age        = $_POST['age'];

            echo $firstname . " you are " . $age . ' years old.';
       }
       
    ?>
    <form action="index.php" method="POST">
        <table>
            <tr>
                <td>Name</td>
                <td><input name="name" type="text" /> </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input name="age" type="text" /> </td>
            </tr>
            <tr>
                <td></td>
                <td><input name="submit" type="submit" value="Submit" /> </td>
            </tr>
        </table>
    </form>


</body>
</html>