<?php
require_once 'db.php';

// Query to select all users
$query = "SELECT * FROM Users";
$result = mysqli_query($conn, $query);

if ($result) {
    // Check if any users are returned
    if (mysqli_num_rows($result) > 0) {
        // Output table headers
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
              </thead>";
        
        // Output user data in HTML table rows
        echo "<tbody>";
        while ($user = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $user['ID'] . "</td>";
            echo "<td>" . $user['Username'] . "</td>";
            echo "<td>" . $user['Email'] . "</td>";
            echo "<td>" . $user['Role'] . "</td>";
            echo "<td>" . $user['Registration_Date'] . "</td>";
            echo "<td class='btn-group'>
                    <button class='edit-user'>Edit</button>
                    <button class='delete-user'>Delete</button>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody>";
    } else {
        // If no users found
        echo "<tr><td colspan='6'>No users found</td></tr>";
    }
} else {
    // If query execution failed
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>