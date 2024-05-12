<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web|desktop_application";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {
        $customer_id = $_POST["customer_id"];
        $date = $_POST["date"];
        $total_amount = $_POST["total_amount"];
        $status = $_POST["status"];
        createInvoice($customer_id, $date, $total_amount, $status);
    } elseif (isset($_POST["update"])) {
        $id = $_POST["id"];
        $customer_id = $_POST["new_customer_id"];
        $date = $_POST["new_date"];
        $total_amount = $_POST["new_total_amount"];
        $status = $_POST["new_status"];
        updateInvoice($id, $customer_id, $date, $total_amount, $status);
    } elseif (isset($_POST["delete"])) {
        $id = $_POST["id"];
        deleteInvoice($id);
    }
}
function createInvoice($customer_id, $date, $total_amount, $status) {
    global $conn;
    $sql = "INSERT INTO invoice (customer_id, date, total_amount, status) VALUES ('$customer_id', '$date', '$total_amount', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "New invoice created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
function readInvoices() {
    global $conn;
    $sql = "SELECT id, customer_id, date, total_amount, status FROM invoice";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Customer ID: " . $row["customer_id"]. " - Date: " . $row["date"]. " - Total Amount: " . $row["total_amount"]. " - Status: " . $row["status"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
function updateInvoice($id, $customer_id, $date, $total_amount, $status) {
    global $conn;
    $sql = "UPDATE invoice SET customer_id='$customer_id', date='$date', total_amount='$total_amount', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Invoice updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
function deleteInvoice($id) {
    global $conn;
    $sql = "DELETE FROM invoice WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Invoice deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice CRUD</title>
</head>
<body>

<h2>Create New Invoice</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Customer ID:</label><br>
    <input type="text" name="customer_id" required><br>
    <label>Date:</label><br>
    <input type="date" name="date" required><br>
    <label>Total Amount:</label><br>
    <input type="number" name="total_amount" required><br>
    <label>Status:</label><br>
    <input type="text" name="status" required><br><br>
    <input type="submit" name="create" value="Create">
</form>

<h2>Update Invoice</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Invoice ID to Update:</label><br>
    <input type="number" name="id" required><br>
    <label>New Customer ID:</label><br>
    <input type="text" name="new_customer_id"><br>
    <label>New Date:</label><br>
    <input type="date" name="new_date"><br>
    <label>New Total Amount:</label><br>
    <input type="number" name="new_total_amount"><br>
    <label>New Status:</label><br>
    <input type="text" name="new_status"><br><br>
    <input type="submit" name="update" value="Update">
</form>

<h2>Delete Invoice</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label>Invoice ID to Delete:</label><br>
    <input type="number" name="id" required><br><br>
    <input type="submit" name="delete" value="Delete">
</form>

<h2>Invoices</h2>
<?php
readInvoices();
?>

</body>
</html>