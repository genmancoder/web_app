<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Connection to the database
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection Failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM users";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD USER</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of Users</h2>
        <a class="btn btn-primary" href="create.php" role="button">New User +</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Read data of each row
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
