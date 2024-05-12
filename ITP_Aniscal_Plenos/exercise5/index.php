<?php
require_once 'db.php';
require_once 'controllers/UserController.php';
$dirName = dirname($_SERVER['SCRIPT_NAME']);
// Check if the request is for the main page
if ($_SERVER['REQUEST_URI'] === $dirName.'/' || $_SERVER['REQUEST_URI'] === $dirName . '/index.php') {
    header("Location: $dirName/views/users/index.php");
    exit; 
}
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$userController = new UserController($conn);

switch ($action) {
    case 'index':
        $userController->index();
        break;
    case 'create':
        $userController->create();
        break;
    case 'edit':
        $userController->edit();
        require_once 'views/users/edit.php';
        break;
    case 'update':
        $userController->update();
        break;
    case 'delete':
        $userController->delete();
        break;
    default:
        echo "404 - Not Found";
        break;
}
