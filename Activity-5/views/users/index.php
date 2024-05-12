<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Add Users</a>
    </div>
   </nav>

   <div class="container mt-5">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
        Add User
    </button>
    <?php
    require_once '../../db.php';
    require_once '../../controllers/UserController.php';

    $userController = new UserController($conn);
    $users = $userController->index();
    if ($users) {
        ?>
        <h2>User List</h2>
        <table border="1" class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="../../index.php?action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                        <a href="../../index.php?action=delete&id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- <a href="create.php">Add New User</a> -->
        <?php
    } else {
        echo "No users found.";
    }
?>

   </div>
\
   <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>

        </div>
        <div class="modal-body">
          <form action="../../index.php?action=create" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
        </form>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>