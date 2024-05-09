<!DOCTYPE html>
<html>
<head>
    <title>PHP Table with Edit and Delete Buttons</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        // Database connection
        $servername = "localhost";
        $db_username = "root";
        $password = "";
        $dbname = "person";
        $conn = new mysqli($servername, $db_username, $password, $dbname);
        // Fetch data from the database
        $sql = "SELECT id, username, email FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><button onclick='editRecord(" . $row["id"] . ", \"" . $row["username"] . "\", \"" . $row["email"] . "\")'>Edit</button> <button onclick='deleteRecord(" . $row["id"] . ")'>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        $conn->close();

        function updateRecord($id, $username, $email) {
            $servername = "localhost";
            $db_username = "root";
            $password = "";
            $dbname = "person";
            $conn = new mysqli($servername, $db_username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Record updated successfully</p>";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }

        if(isset($_POST['add'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $conn = new mysqli($servername, $db_username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO users (username, email) VALUES ('$name', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>New record added successfully</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }

        if(isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];

            $conn = new mysqli($servername, $db_username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM users WHERE id=$delete_id";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Record deleted successfully</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }

        if(isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            updateRecord($id, $name, $email);
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        }
        ?>
    </table>

    <div class="add-edit-section">
        <h2>Add New Record</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            <button type="submit" name="add">Add</button>
        </form>
    </div>

    <div class="add-edit-section">
        <h2>Edit Record</h2>
        <form method="post" id="editForm" style="display: none;">
            <input type="hidden" name="id" id="editId">
            <label for="editName">Name:</label>
            <input type="text" name="name" id="editName" required><br><br>
            <label for="editEmail">Email:</label>
            <input type="email" name="email" id="editEmail" required><br><br>
            <button type="submit" name="update">Update</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
    </div>

    <script>
        function editRecord(id, username, email) {
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>
</body>
</html>
