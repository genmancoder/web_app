<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $userModel;

    public function __construct($conn) {
        $this->userModel = new User($conn);
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require_once '../../views/users/index.php';
        return $users;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $this->userModel->createUser($username, $email);
            header('Location: views/users/index.php');
            exit;
        }
        require_once 'views/users/create.php';
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $user = $this->userModel->getUserById($_GET['id']);
            if ($user) {
                require_once 'views/users/edit.php';
            } else {
                echo 'User not found.';
            }
        } else {
            echo 'Invalid request';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $this->userModel->updateUser($id, $username, $email);
            header('Location: views/users/index.php');
            exit;
        } else {
            echo 'Invalid request';
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $this->userModel->deleteUser($_GET['id']);
            header('Location: views/users/index.php');
            exit;
        } else {
            echo 'Invalid request';
        }
    }
}
