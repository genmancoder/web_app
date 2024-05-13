<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>User Management</h2>
    <form method="post" id="userForm">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <input type="submit" value="Add User">
    </form>

    <table id="userTable">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        <!-- User rows will be inserted here dynamically -->
    </table>

    <h2>Product Management</h2>
    <form method="post" id="productForm">
        <input type="text" name="name" placeholder="Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" name="price" placeholder="Price" step="0.01" min="0" required>
        <input type="number" name="quantity" placeholder="Quantity" min="0" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="submit" value="Add Product">
    </form>

    <table id="productTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <!-- Product rows will be inserted here dynamically -->
    </table>
    <!-- Edit User Modal -->
    <div id="editUserModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit User</h2>
            <form id="editUserForm">
                <input type="hidden" id="editUserId" name="userId">
                <label for="editUsername">Username:</label>
                <input type="text" id="editUsername" name="username" required>
                <label for="editEmail">Email:</label>
                <input type="email" id="editEmail" name="email" required>
                <label for="editRole">Role:</label>
                <select id="editRole" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Product</h2>
            <form id="editProductForm">
                <input type="hidden" id="editProductId" name="productId">
                <label for="editProductName">Name:</label>
                <input type="text" id="editProductName" name="name" required>
                <label for="editProductDescription">Description:</label>
                <textarea id="editProductDescription" name="description" required></textarea>
                <label for="editProductPrice">Price:</label>
                <input type="number" id="editProductPrice" name="price" step="0.01" min="0" required>
                <label for="editProductQuantity">Quantity:</label>
                <input type="number" id="editProductQuantity" name="quantity" min="0" required>
                <label for="editProductCategory">Category:</label>
                <input type="text" id="editProductCategory" name="category" required>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Function to reset edit user form fields
        function resetEditUserForm() {
            $('#editUserForm')[0].reset();
        }

        // Function to reset edit product form fields
        function resetEditProductForm() {
            $('#editProductForm')[0].reset();
        }

        // Event listener for closing edit user modal
        $('#editUserModal .close').click(function() {
            $('#editUserModal').css('display', 'none');
            resetEditUserForm();
        });

        // Event listener for closing edit product modal
        $('#editProductModal .close').click(function() {
            $('#editProductModal').css('display', 'none');
            resetEditProductForm();
        });

        // Fetch and display users and products on page load
        fetchUsers();
        fetchProducts();

        // Function to fetch and display users
        function fetchUsers() {
            $.ajax({
                url: 'fetch_users.php',
                type: 'POST',
                success: function(response) {
                    $('#userTable tbody').html(response);
                }
            });
        }

        // Function to fetch and display products
        function fetchProducts() {
            $.ajax({
                url: 'fetch_products.php',
                type: 'POST',
                success: function(response) {
                    $('#productTable tbody').html(response);
                }
            });
        }

        // Add User form submission
        $('#userForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'add_user.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('User added successfully:', response);
                    fetchUsers();
                    $('#userForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error adding user:', error);
                }
            });
        });

        // Add Product form submission
        $('#productForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'add_product.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Product added successfully:', response);
                    fetchProducts();
                    $('#productForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    console.error('Error adding product:', error);
                }
            });
        });


        // Event listener for edit user button click
        $('#userTable').on('click', '.edit-user', function() {
            var userId = $(this).closest('tr').find('td:first').text();
            // Fetch user details for editing
            $.ajax({
                url: 'get_user.php', // Replace 'get_user.php' with the actual URL to fetch user details
                type: 'POST',
                data: {
                    userId: userId
                },
                success: function(response) {
                    console.log('User response:', response); // Log the response to console
                    var userData = JSON.parse(response);
                    // Populate edit user form fields
                    $('#editUserId').val(userData.ID);
                    $('#editUsername').val(userData.Username);
                    $('#editEmail').val(userData.Email);
                    $('#editRole').val(userData.Role);
                    // Show the edit user modal
                    $('#editUserModal').css('display', 'block');
                }
            });
        });

        // Event listener for edit product button click
        $('#productTable').on('click', '.edit-product', function() {
            var productId = $(this).closest('tr').find('td:first').text();
            // Fetch product details for editing
            $.ajax({
                url: 'get_product.php', // Replace 'get_product.php' with the actual URL to fetch product details
                type: 'POST',
                data: {
                    productId: productId
                },
                success: function(response) {
                    console.log('Product response:',
                    response); // Log the response to console
                    var productData = JSON.parse(response);
                    // Populate edit product form fields
                    $('#editProductId').val(productData.ID);
                    $('#editProductName').val(productData.Name);
                    $('#editProductDescription').val(productData.Description);
                    $('#editProductPrice').val(productData.Price);
                    $('#editProductQuantity').val(productData.Quantity);
                    $('#editProductCategory').val(productData.Category);
                    // Show the edit product modal
                    $('#editProductModal').css('display', 'block');
                }
            });
        });

        // Event listener for delete user button click
        $('#userTable').on('click', '.delete-user', function() {
            var userId = $(this).closest('tr').find('td:first').text();
            // Confirm deletion
            if (confirm("Are you sure you want to delete this user?")) {
                // Delete user
                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        fetchUsers(); // Refresh user table
                    }
                });
            }
        });

        // Event listener for delete product button click
        $('#productTable').on('click', '.delete-product', function() {
            var productId = $(this).closest('tr').find('td:first').text();
            // Confirm deletion
            if (confirm("Are you sure you want to delete this product?")) {
                // Delete product
                $.ajax({
                    url: 'delete_product.php',
                    type: 'POST',
                    data: {
                        productId: productId
                    },
                    success: function(response) {
                        fetchProducts(); // Refresh product table
                    }
                });
            }
        });

        // Event listener for saving edited user details
        $('#editUserForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'edit_users.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('User details updated successfully:', response);
                    $('#editUserModal').css('display', 'none');
                    fetchUsers();
                    resetEditUserForm(); // Reset edit user form
                },
                error: function(xhr, status, error) {
                    console.error('Error updating user details:', error);
                }
            });
        });

        // Event listener for saving edited product details
        $('#editProductForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'edit_product.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Product details updated successfully:', response);
                    $('#editProductModal').css('display', 'none');
                    fetchProducts();
                    resetEditProductForm(); // Reset edit product form
                },
                error: function(xhr, status, error) {
                    console.error('Error updating product details:', error);
                }
            });
        });
    });
    </script>


</body>

</html>