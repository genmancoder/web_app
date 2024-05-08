<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Connection to the database
$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$userName = "";
$email = "";

$errors = [];
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method - shows the data of the user

    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); //read data from the database

    if (!$row) {
        header("location: index.php");
        exit;
    }
    $userName = $row["username"];
    $email = $row["email"];
} else {
    // POST method - update the data of the user
    $id = $_POST["id"];
    $userName = $_POST["username"];
    $email = $_POST["email"];

    // Check if any field is empty
    if (empty($id) || empty($userName) || empty($email)) {
        $errors[] = "All Fields Are Required!";
    } else {
        $sql = "UPDATE users SET username = '$userName', email = '$email' WHERE id =$id";
        $result = $connection->query($sql); // execute

        if (!$result) {
            $errors[] = "Error updating record: " . $connection->error;
        } else {
            $successMessage = "User updated successfully";
            header("location: index.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER INFO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>Edit User</h2>

        <?php if (!empty($errors)) : ?>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Error:</strong>
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $userName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
