<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Connection to the database
$connection = new mysqli($servername, $username, $password, $database);

$username = "";
$email = "";

$errors = []; // Array to store validation errors

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Check if any field is empty
    if (empty($username)) {
        $errors['username'] = "Username is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required";
    }

    // If there are no validation errors so far, proceed with further checks
    if (empty($errors)) {
        // Check if username or email already exists
        $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $checkResult = $connection->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            $errors['duplicate'] = "Username or email already exists";
        } else {
            //ADD NEW USER TO DATABASE
            $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
            $result = $connection->query($sql);

            if (!$result) {
                $errors['query'] = "Invalid query: " . $connection->error;
            } else {
                $successMessage = "New User is Added Successfully";
                // Reset form fields after successful submission
                $username = "";
                $email = "";
            }
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
    <h2>New User</h2>

    <?php if (!empty($errors)): ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Error:</strong>
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
            </ul>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
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
        </div>
    </form>
    </div>
</body>
</html>
