<?php
// Include your database connection file
include 'db.php';

// Check if userId is provided and is a valid integer
if (isset($_POST['userId']) && is_numeric($_POST['userId'])) {
    // Sanitize the input to prevent SQL injection
    $userId = intval($_POST['userId']);

    // Prepare and execute the SQL query to fetch user details
    $query = "SELECT * FROM users WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the user details
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Return user details as JSON response
        echo json_encode($user);
    } else {
        // If no user found, return an error message
        echo json_encode(['error' => 'User not found']);
    }
} else {
    // If userId is not provided or not valid, return an error message
    echo json_encode(['error' => 'Invalid user ID']);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>