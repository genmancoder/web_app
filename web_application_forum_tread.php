<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "web|desktop_application";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {
        $title = $_POST["title"];
        $author = $_POST["author"];
        $content = $_POST["content"];
        $category = $_POST["category"];
        createForumThread($title, $author, $content, $category);
    } elseif (isset($_POST["update"])) {
        $id = $_POST["id"];
        $title = $_POST["new_title"];
        $author = $_POST["new_author"];
        $content = $_POST["new_content"];
        $category = $_POST["new_category"];
        updateForumThread($id, $title, $author, $content, $category);
    } elseif (isset($_POST["delete"])) {
        $id = $_POST["id"];
        deleteForumThread($id);
    }
}
function createForumThread($title, $author, $content, $category) {
    global $conn;
    $sql = "INSERT INTO forum_thread (title, author, content, category) VALUES ('$title', '$author', '$content', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "New forum thread created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function readForumThreads() {
    global $conn;
    $sql = "SELECT id, title, author, content, date, category FROM forum_thread";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Title: " . $row["title"]. " - Author: " . $row["author"]. " - Date: " . $row["date"]. " - Category: " . $row["category"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
function updateForumThread($id, $title, $author, $content, $category) {
    global $conn;
    $sql = "UPDATE forum_thread SET title='$title', author='$author', content='$content', category='$category' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Forum thread updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
function deleteForumThread($id) {
    global $conn;
    $sql = "DELETE FROM forum_thread WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Forum thread deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum Thread CRUD</title>
</head>
<body>

<h2>Create New Forum Thread</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Title:</label><br>
    <input type="text" name="title" required><br>
    <label>Author:</label><br>
    <input type="text" name="author" required><br>
    <label>Content:</label><br>
    <textarea name="content" rows="4" cols="50" required></textarea><br>
    <label>Category:</label><br>
    <input type="text" name="category" required><br><br>
    <input type="submit" name="create" value="Create">
</form>

<h2>Update Forum Thread</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Thread ID to Update:</label><br>
    <input type="number" name="id" required><br>
    <label>New Title:</label><br>
    <input type="text" name="new_title"><br>
    <label>New Author:</label><br>
    <input type="text" name="new_author"><br>
    <label>New Content:</label><br>
    <textarea name="new_content" rows="4" cols="50"></textarea><br>
    <label>New Category:</label><br>
    <input type="text" name="new_category"><br><br>
    <input type="submit" name="update" value="Update">
</form>

<h2>Delete Forum Thread</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Thread ID to Delete:</label><br>
    <input type="number" name="id" required><br><br>
    <input type="submit" name="delete" value="Delete">
</form>

<h2>Forum Threads</h2>
<?php
readForumThreads();
?>

</body>
</html>