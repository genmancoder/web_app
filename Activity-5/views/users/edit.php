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
   <?php if ($user !== null): ?>
    <form action="index.php?action=update" method="post">
        <div class="mb-3">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
             <label for="exampleFormControlInput1" class="form-label">Username</label>
                 <input type="text" class="form-control" name="username" id="username" placeholder="" value="<?php echo $user['username']; ?>">
             </div>
                 <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label">email</label>
                 <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $user['email']; ?>">
             </div>
             <button type="submit" class="btn btn-success" data-bs-toggle="modal">
             Save
            </button>
         </div>
    </form>
    <?php else: ?>
    <p>User not found.</p>
<?php endif; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>