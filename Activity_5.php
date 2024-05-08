<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .box {
            width: 200px;
            height: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f2f2f2;
            display: inline-block;
            vertical-align: top;
        }

        .box form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box input[type="text"],
        .box input[type="email"],
        .box select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: -3px;
            width: 80%;
            font-size: 10px;

        }

        .box button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .box button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            text-align: left;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <h2>Create Record</h2>
            <form method="post">
                <input type="text" name="username" placeholder="Username"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <button type="submit" name="create">Create</button>
            </form>
        </div>
        <div class="box">
            <h2>Read Records</h2>
            <form method="post">
                <button type="submit" name="read">View All</button>
            </form>
        </div>
        <div class="box">
            <h2>Update Record</h2>
            <form method="post">
                <select name="id">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "mydatabase";

                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT id FROM users";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select><br>
                <input type="text" name="username" placeholder="New Username" required><br>
                <input type="email" name="email" placeholder="New Email" required><br>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
        <div class="box">
            <h2>Delete Record</h2>
            <form method="post">
                <select name="id">
                    <?php
                    $conn = new mysqli($servername, $username, $password, $database);
                    $sql = "SELECT id FROM users";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select><br>
                <button type="submit" name="delete">Delete</button>
            </form>
        </div>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['create'])) {
                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                } elseif (isset($_POST['read'])) {
                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT id, username, email FROM users";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "id: " . $row["id"] . " - Username: " . $row["username"] . " - Email: " . $row["email"] . "<br>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                } elseif (isset($_POST['update'])) {
                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $id = $_POST['id'];
                    $new_username = $_POST['username'];
                    $new_email = $_POST['email'];
                    $sql = "UPDATE users SET username='$new_username', email='$new_email' WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    $conn->close();
                } elseif (isset($_POST['delete'])) {
                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $id = $_POST['id'];
                    $sql = "DELETE FROM users WHERE id='$id'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . $conn->error;
                    }
                    $conn->close();
                }
            }
            ?>
        </div>
    </div>
</body>

</html>