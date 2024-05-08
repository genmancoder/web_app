<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    // Connection to the database
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM users WHERE id=$id";
    $result = $connection->query($sql); // execute

}
    //redirect user
    header("location: index.php");
    exit;
?>