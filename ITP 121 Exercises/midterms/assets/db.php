<?php
// Database connection
$host = "localhost";
$sql_username = "Jareth";
$sql_password = "Jareth0223";
$database = "crud_db";

$conn = new mysqli($host, $sql_username, $sql_password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create User
function createUser($username, $email, $password, $role) {
    global $conn;
    $sql = "INSERT INTO Users (Username, Email, Password, Role) VALUES ('$username', '$email', '$password', '$role')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Read Users
function getUsers() {
    global $conn;
    $sql = "SELECT * FROM Users";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $users;
}

// Update User
function updateUser($id, $username, $email, $password, $role) {
    global $conn;
    $sql = "UPDATE Users SET Username='$username', Email='$email', Password='$password', Role='$role' WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Delete User
function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM Users WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Create Product
function createProduct($name, $description, $price, $quantity, $category) {
    global $conn;
    $sql = "INSERT INTO Products (Name, Description, Price, Quantity, Category) VALUES ('$name', '$description', $price, $quantity, '$category')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Read Products
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
}

// Update Product
function updateProduct($id, $name, $description, $price, $quantity, $category) {
    global $conn;
    $sql = "UPDATE Products SET Name='$name', Description='$description', Price=$price, Quantity=$quantity, Category='$category' WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Delete Product
function deleteProduct($id) {
    global $conn;
    $sql = "DELETE FROM Products WHERE ID=$id";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>