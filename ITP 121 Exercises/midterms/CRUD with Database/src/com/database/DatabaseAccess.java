package com.database;

import javax.swing.JOptionPane;
import java.sql.*;
import javax.swing.table.DefaultTableModel;

/**
 * @author Jareth Baur
 * @since May 14 2024
 */
public class DatabaseAccess {

    private static final String SQLURL = "jdbc:mysql://localhost:3306/crud_db";
    private static final String SQLUSERNAME = "Jareth";
    private static final String SQLPASSWORD = "Jareth0223";

    public static void refreshTables(DefaultTableModel usersModel, DefaultTableModel productsModel) {
        viewUsers(usersModel);
        viewProducts(productsModel);
        System.out.println("Tables rendered.");
    }

    private static void viewProducts(DefaultTableModel model) {
        // Clear existing rows from the table model
        while (model.getRowCount() > 0) {
            model.removeRow(0);
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to select all products
            String selectQuery = "SELECT * FROM Products";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(selectQuery);
            // Execute the query
            ResultSet resultSet = preparedStatement.executeQuery();

            int rowCount = 0;
            // Iterate through the result set and add rows to the table model
            while (resultSet.next()) {
                Object[] row = {
                    resultSet.getInt("ID"),
                    resultSet.getString("Name"),
                    resultSet.getString("Description"),
                    resultSet.getDouble("Price"),
                    resultSet.getInt("Quantity"),
                    resultSet.getString("Category")
                };
                model.addRow(row);
                rowCount++;
            }

            // Close resources
            connection.close();
            preparedStatement.close();
            resultSet.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
    }

    // Method to view users in a table
    private static void viewUsers(DefaultTableModel model) {
        // Clear existing rows from the table model
        while (model.getRowCount() > 0) {
            model.removeRow(0);
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to select all users
            String selectQuery = "SELECT * FROM Users";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(selectQuery);
            // Execute the query
            ResultSet resultSet = preparedStatement.executeQuery();

            int rowCount = 0;
            // Iterate through the result set and add rows to the table model
            while (resultSet.next()) {
                Object[] row = {
                    resultSet.getInt("ID"),
                    resultSet.getString("Username"),
                    resultSet.getString("Email"),
                    resultSet.getString("Role"),
                    resultSet.getString("Registration_Date")
                };
                model.addRow(row);
                rowCount++;
            }

            // Close resources
            connection.close();
            preparedStatement.close();
            resultSet.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
    }

    // Method to add a new product
    public static boolean addProduct(String name, String description, double price, int quantity, String category) {
        boolean isProductAdded = false;
        // Basic input validation
        if (name.isEmpty() || description.isEmpty() || price <= 0 || quantity <= 0 || category.isEmpty()) {
            JOptionPane.showMessageDialog(null, "Please provide valid details for the product.", "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Invalid Product Details");
            return isProductAdded;
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to insert a new product
            String insertQuery = "INSERT INTO Products (Name, Description, Price, Quantity, Category) VALUES (?, ?, ?, ?, ?)";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(insertQuery);
            // Set parameters
            preparedStatement.setString(1, name);
            preparedStatement.setString(2, description);
            preparedStatement.setDouble(3, price);
            preparedStatement.setInt(4, quantity);
            preparedStatement.setString(5, category);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the product was successfully added
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "Product added successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
                isProductAdded = true;
                System.out.println("Product added successfully.");
            } else {
                JOptionPane.showMessageDialog(null, "Failed to add product.", "Error", JOptionPane.ERROR_MESSAGE);
                System.out.println("Failed to add product.");
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
        return isProductAdded;
    }

    // Method to add a new user
    public static boolean addUser(String username, String email, String password, String role) {
        boolean isUserAdded = false;
        // Basic input validation
        if (username.isEmpty() || email.isEmpty() || password.isEmpty() || role.isEmpty()) {
            JOptionPane.showMessageDialog(null, "Please provide valid details for the user.", "Error", JOptionPane.ERROR_MESSAGE);
            return isUserAdded;
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to insert a new user
            String insertQuery = "INSERT INTO Users (Username, Email, Password, Role) VALUES (?, ?, ?, ?)";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(insertQuery);
            // Set parameters
            preparedStatement.setString(1, username);
            preparedStatement.setString(2, email);
            preparedStatement.setString(3, password);
            preparedStatement.setString(4, role);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the user was successfully added
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "User added successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
                isUserAdded = true;
            } else {
                JOptionPane.showMessageDialog(null, "Failed to add user.", "Error", JOptionPane.ERROR_MESSAGE);
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
            return isUserAdded;
        }
        return isUserAdded;
    }

    // Method to update user details
    public static boolean updateUser(int userID, String username, String email, String role) {
        boolean isUserUpdated = false;
        // Basic input validation
        if (username.isEmpty() || email.isEmpty() || role.isEmpty()) {
            JOptionPane.showMessageDialog(null, "Please provide valid details for the user.", "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Invalid details.");
            return isUserUpdated;
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to update user details
            String updateQuery = "UPDATE Users SET Username=?, Email=?, Role=? WHERE ID=?";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(updateQuery);
            // Set parameters
            preparedStatement.setString(1, username);
            preparedStatement.setString(2, email);
            preparedStatement.setString(3, role);
            preparedStatement.setInt(4, userID);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the user details were successfully updated
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "User details updated successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
                System.out.println("User details updated successfully.");
                isUserUpdated = true;
            } else {
                JOptionPane.showMessageDialog(null, "Failed to update user details.", "Error", JOptionPane.ERROR_MESSAGE);
                System.out.println("Failed to update user details.");
                isUserUpdated = false;
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
            isUserUpdated = false;
        }
        return isUserUpdated;
    }

    // Method to update product details
    public static void updateProduct(int productID, String name, String description, double price, int quantity, String category) {
        // Basic input validation
        if (name.isEmpty() || description.isEmpty() || category.isEmpty()) {
            JOptionPane.showMessageDialog(null, "Please provide valid details for the product.", "Error", JOptionPane.ERROR_MESSAGE);
            return;
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to update product details
            String updateQuery = "UPDATE Products SET Name=?, Description=?, Price=?, Quantity=?, Category=? WHERE ID=?";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(updateQuery);
            // Set parameters
            preparedStatement.setString(1, name);
            preparedStatement.setString(2, description);
            preparedStatement.setDouble(3, price);
            preparedStatement.setInt(4, quantity);
            preparedStatement.setString(5, category);
            preparedStatement.setInt(6, productID);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the product details were successfully updated
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "Product details updated successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
            } else {
                JOptionPane.showMessageDialog(null, "Failed to update product details.", "Error", JOptionPane.ERROR_MESSAGE);
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
    }

    // Method to delete a user
    public static void deleteUser(int userID) {
        // Confirm deletion
        int confirm = JOptionPane.showConfirmDialog(null, "Are you sure you want to delete this user?", "Confirm Deletion", JOptionPane.YES_NO_OPTION);
        if (confirm != JOptionPane.YES_OPTION) {
            return; // Cancel deletion if not confirmed
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to delete user
            String deleteQuery = "DELETE FROM Users WHERE ID=?";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(deleteQuery);
            // Set parameter
            preparedStatement.setInt(1, userID);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the user was successfully deleted
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "User deleted successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
                System.out.println("User deleted successfully.");
            } else {
                JOptionPane.showMessageDialog(null, "Failed to delete user.", "Error", JOptionPane.ERROR_MESSAGE);
                System.out.println("Failed to delete user.");
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
    }

    // Method to delete a product
    public static void deleteProduct(int productID) {
        // Confirm deletion
        int confirm = JOptionPane.showConfirmDialog(null, "Are you sure you want to delete this product?", "Confirm Deletion", JOptionPane.YES_NO_OPTION);
        if (confirm != JOptionPane.YES_OPTION) {
            return; // Cancel deletion if not confirmed
        }

        try {
            // Establish connection
            Connection connection = DriverManager.getConnection(SQLURL, SQLUSERNAME, SQLPASSWORD);
            // SQL query to delete product
            String deleteQuery = "DELETE FROM Products WHERE ID=?";
            // Create a prepared statement
            PreparedStatement preparedStatement = connection.prepareStatement(deleteQuery);
            // Set parameter
            preparedStatement.setInt(1, productID);
            // Execute the query
            int rowsAffected = preparedStatement.executeUpdate();

            // Check if the product was successfully deleted
            if (rowsAffected > 0) {
                JOptionPane.showMessageDialog(null, "Product deleted successfully.", "Success", JOptionPane.INFORMATION_MESSAGE);
                System.out.println("Product deleted successfully.");
            } else {
                JOptionPane.showMessageDialog(null, "Failed to delete product.", "Error", JOptionPane.ERROR_MESSAGE);
                System.out.println("Failed to delete product.");
            }

            // Close resources
            connection.close();
            preparedStatement.close();
        } catch (SQLException e) {
            // Handle database errors
            JOptionPane.showMessageDialog(null, "Database error: " + e.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Error: " + e.getMessage());
        }
    }
}
