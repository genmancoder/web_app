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

$search_query = ""; // Initialize $search_query variable
$error_message = "";

if(isset($_POST['search'])) {
    $search_query = $_POST['query'];
    
    if(empty($search_query)) {
        $error_message = "Please enter a search query.";
    } else {
        // SQL query to search for users based on username or email
        $sql = "SELECT * FROM users WHERE username LIKE '%$search_query%' OR email LIKE '%$search_query%'";
        
        $result = $connection->query($sql);
        
        if (!$result) {
            die("Invalid query: " . $connection->error);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>Search Users</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Search Query</label>
                <input type="text" class="form-control" id="searchQuery" name="query" value="<?php echo $search_query; ?>">
                <?php if(!empty($error_message)): ?>
                    <div class="text-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
        
        <?php if(isset($result)): ?>
            <div class="mt-5">
                <h2>Search Results</h2>
                <p>Showing search results for: <?php echo $search_query; ?></p>
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
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                                    <a class='btn btn-danger btn-sm' href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>

<?php
// Close the database connection
$connection->close();
?>
