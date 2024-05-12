<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createUser($username, $email) {
        $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
        $this->conn->query($sql);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function updateUser($id, $username, $email) {
        $sql = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";
        $this->conn->query($sql);
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = $id";
        $this->conn->query($sql);
    }
}
