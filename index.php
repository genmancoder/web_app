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

            $age        = $_POST['age'];

            if($age <= 18) 
            {
                echo " you are minor";
            }
            else if($age > 18 && $age < 60) 
            {
                echo " you are adult";
            }else 
            {
                echo " you are senior citizen";
            }
       }
       
    ?>
    <form action="index.php" method="POST">
        <table>
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