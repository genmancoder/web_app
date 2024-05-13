package com.frames;

import com.database.DatabaseAccess;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

/**
 * @author Jareth Baur
 * @since May 14 2024
 */
public class MainFrame extends javax.swing.JFrame {
    
    private int userID;
    private int productID;

    /**
     * Creates new form MainFrame
     */
    public MainFrame() {
        initComponents();
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }
    
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        rootPanel = new javax.swing.JPanel();
        tabs = new javax.swing.JTabbedPane();
        usersTab = new javax.swing.JPanel();
        usersTableScrollPane = new javax.swing.JScrollPane();
        usersTable = new javax.swing.JTable();
        usernameField = new javax.swing.JTextField();
        emailField = new javax.swing.JTextField();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        saveUserDetailsButton = new javax.swing.JButton();
        deleteUserButton = new javax.swing.JButton();
        addUserButton = new javax.swing.JButton();
        roleComboBox = new javax.swing.JComboBox<>();
        renderUserTableButton = new javax.swing.JButton();
        productsTab = new javax.swing.JPanel();
        productsTableScrollPane = new javax.swing.JScrollPane();
        productsTable = new javax.swing.JTable();
        nameField = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        jLabel5 = new javax.swing.JLabel();
        descriptionField = new javax.swing.JTextField();
        priceField = new javax.swing.JTextField();
        quantityField = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        categoryField = new javax.swing.JTextField();
        jLabel8 = new javax.swing.JLabel();
        saveProductDetailsButton = new javax.swing.JButton();
        deleteProductsButton = new javax.swing.JButton();
        addProductButton = new javax.swing.JButton();
        renderProductsTableButton = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Crud with Database - Main Frame");
        setResizable(false);

        usersTable.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "User ID", "Username", "Email", "Role", "Registration Date"
            }
        ));
        usersTable.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                usersTableMouseClicked(evt);
            }
        });
        usersTableScrollPane.setViewportView(usersTable);

        jLabel1.setText("Username");

        jLabel2.setText("Email");

        jLabel3.setText("Role");

        saveUserDetailsButton.setText("Save Details");
        saveUserDetailsButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        saveUserDetailsButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                saveUserDetailsButtonMouseClicked(evt);
            }
        });

        deleteUserButton.setText("Delete");
        deleteUserButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        deleteUserButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                deleteUserButtonMouseClicked(evt);
            }
        });

        addUserButton.setText("Add User");
        addUserButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        addUserButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                addUserButtonMouseClicked(evt);
            }
        });

        roleComboBox.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Admin", "User" }));
        roleComboBox.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));

        renderUserTableButton.setText("Render Table");
        renderUserTableButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        renderUserTableButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                renderUserTableButtonMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout usersTabLayout = new javax.swing.GroupLayout(usersTab);
        usersTab.setLayout(usersTabLayout);
        usersTabLayout.setHorizontalGroup(
            usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(usersTabLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(usersTableScrollPane, javax.swing.GroupLayout.DEFAULT_SIZE, 668, Short.MAX_VALUE)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, usersTabLayout.createSequentialGroup()
                        .addComponent(addUserButton)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jLabel2, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, 80, Short.MAX_VALUE)
                            .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addGroup(usersTabLayout.createSequentialGroup()
                                .addComponent(saveUserDetailsButton)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 97, Short.MAX_VALUE)
                                .addComponent(deleteUserButton, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(usernameField)
                            .addComponent(emailField)
                            .addComponent(roleComboBox, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                    .addGroup(usersTabLayout.createSequentialGroup()
                        .addComponent(renderUserTableButton)
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
        );
        usersTabLayout.setVerticalGroup(
            usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(usersTabLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(usersTableScrollPane, javax.swing.GroupLayout.PREFERRED_SIZE, 177, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(usernameField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel1)
                    .addComponent(addUserButton))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(emailField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel2))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel3)
                    .addComponent(roleComboBox, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(usersTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(saveUserDetailsButton)
                    .addComponent(deleteUserButton))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 31, Short.MAX_VALUE)
                .addComponent(renderUserTableButton)
                .addContainerGap())
        );

        tabs.addTab("Users", usersTab);

        productsTable.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "User ID", "Name", "Description", "Price", "Quantity", "Category"
            }
        ));
        productsTable.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                productsTableMouseClicked(evt);
            }
        });
        productsTableScrollPane.setViewportView(productsTable);

        jLabel4.setText("Name");

        jLabel5.setText("Description");

        jLabel6.setText("Price");

        jLabel7.setText("Quantity");

        jLabel8.setText("Category");

        saveProductDetailsButton.setText("Save Details");
        saveProductDetailsButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        saveProductDetailsButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                saveProductDetailsButtonMouseClicked(evt);
            }
        });

        deleteProductsButton.setText("Delete");
        deleteProductsButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        deleteProductsButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                deleteProductsButtonMouseClicked(evt);
            }
        });

        addProductButton.setText("Add Product");
        addProductButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        addProductButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                addProductButtonMouseClicked(evt);
            }
        });

        renderProductsTableButton.setText("Render Table");
        renderProductsTableButton.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        renderProductsTableButton.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                renderProductsTableButtonMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout productsTabLayout = new javax.swing.GroupLayout(productsTab);
        productsTab.setLayout(productsTabLayout);
        productsTabLayout.setHorizontalGroup(
            productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(productsTabLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(productsTableScrollPane, javax.swing.GroupLayout.DEFAULT_SIZE, 668, Short.MAX_VALUE)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, productsTabLayout.createSequentialGroup()
                        .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(productsTabLayout.createSequentialGroup()
                                .addComponent(addProductButton)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(jLabel5, javax.swing.GroupLayout.DEFAULT_SIZE, 88, Short.MAX_VALUE)
                                    .addComponent(jLabel4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(jLabel6, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(jLabel7, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(jLabel8, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                            .addGroup(productsTabLayout.createSequentialGroup()
                                .addComponent(renderProductsTableButton)
                                .addGap(0, 0, Short.MAX_VALUE)))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addGroup(productsTabLayout.createSequentialGroup()
                                .addComponent(saveProductDetailsButton)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 125, Short.MAX_VALUE)
                                .addComponent(deleteProductsButton, javax.swing.GroupLayout.PREFERRED_SIZE, 91, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addComponent(categoryField)
                            .addComponent(quantityField)
                            .addComponent(priceField)
                            .addComponent(nameField)
                            .addComponent(descriptionField))))
                .addContainerGap())
        );
        productsTabLayout.setVerticalGroup(
            productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(productsTabLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(productsTableScrollPane, javax.swing.GroupLayout.PREFERRED_SIZE, 177, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(nameField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel4)
                    .addComponent(addProductButton))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel5)
                    .addComponent(descriptionField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(priceField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(quantityField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel7))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(categoryField, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel8))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addGroup(productsTabLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(saveProductDetailsButton)
                    .addComponent(deleteProductsButton)
                    .addComponent(renderProductsTableButton))
                .addContainerGap())
        );

        tabs.addTab("Products", productsTab);

        javax.swing.GroupLayout rootPanelLayout = new javax.swing.GroupLayout(rootPanel);
        rootPanel.setLayout(rootPanelLayout);
        rootPanelLayout.setHorizontalGroup(
            rootPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(rootPanelLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(tabs)
                .addContainerGap())
        );
        rootPanelLayout.setVerticalGroup(
            rootPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(rootPanelLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(tabs)
                .addContainerGap())
        );

        getContentPane().add(rootPanel, java.awt.BorderLayout.CENTER);

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void addProductButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addProductButtonMouseClicked
        new AddProduct().setVisible(true);
        this.dispose();
    }//GEN-LAST:event_addProductButtonMouseClicked

    private void addUserButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addUserButtonMouseClicked
        new AddUser().setVisible(true);
        this.dispose();
    }//GEN-LAST:event_addUserButtonMouseClicked

    private void saveUserDetailsButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_saveUserDetailsButtonMouseClicked
        String username = usernameField.getText();
        String email = emailField.getText();
        String role = (String) roleComboBox.getSelectedItem();
        boolean isUserUpdated = DatabaseAccess.updateUser(this.userID, username, email, role);
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
        if (isUserUpdated) {
            usernameField.setText("");
            emailField.setText("");
        }
    }//GEN-LAST:event_saveUserDetailsButtonMouseClicked

    private void saveProductDetailsButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_saveProductDetailsButtonMouseClicked
        try {
            String name = nameField.getText();
            String description = descriptionField.getText();
            Double price = Double.valueOf(priceField.getText());
            int quantity = Integer.parseInt(quantityField.getText());
            String category = categoryField.getText();
            DatabaseAccess.updateProduct(this.productID, name, description, price, quantity, category);
            nameField.setText("");
            descriptionField.setText("");
            priceField.setText("");
            quantityField.setText("");
            categoryField.setText("");
        } catch (NumberFormatException e) {
            JOptionPane.showMessageDialog(null, "Please provide valid details for the product.", "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Invalid details.");
        }
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }//GEN-LAST:event_saveProductDetailsButtonMouseClicked

    private void deleteProductsButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_deleteProductsButtonMouseClicked
        if (nameField.getText().isBlank() || descriptionField.getText().isBlank() || descriptionField.getText().isBlank() || priceField.getText().isBlank() || quantityField.getText().isBlank() || categoryField.getText().isBlank()) {
            JOptionPane.showMessageDialog(null, "Failed to delete product.", "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Failed to delete product.");
        } else {
            DatabaseAccess.deleteProduct(this.productID);
        }
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }//GEN-LAST:event_deleteProductsButtonMouseClicked

    private void deleteUserButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_deleteUserButtonMouseClicked
        if (usernameField.getText().isBlank() || emailField.getText().isBlank()) {
            JOptionPane.showMessageDialog(null, "Failed to delete user.", "Error", JOptionPane.ERROR_MESSAGE);
            System.out.println("Failed to delete user.");
        } else {
            DatabaseAccess.deleteUser(this.userID);
        }
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }//GEN-LAST:event_deleteUserButtonMouseClicked

    private void usersTableMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_usersTableMouseClicked
        int row = usersTable.getSelectedRow();
        DefaultTableModel model = (DefaultTableModel) usersTable.getModel();
        String stringRole = model.getValueAt(row, 3).toString();
        int role;
        if (stringRole.equalsIgnoreCase("admin")) {
            role = 0;
        } else {
            role = 1;
        }
        if (model.getValueAt(row, 1) != null) {
            this.userID = (int) model.getValueAt(row, 0);
            usernameField.setText(model.getValueAt(row, 1).toString());
            emailField.setText(model.getValueAt(row, 2).toString());
            roleComboBox.setSelectedIndex(role);
        }
    }//GEN-LAST:event_usersTableMouseClicked

    private void productsTableMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_productsTableMouseClicked
        int row = productsTable.getSelectedRow();
        DefaultTableModel model = (DefaultTableModel) productsTable.getModel();
        if (model.getValueAt(row, 1) != null) {
            this.productID = (int) model.getValueAt(row, 0);
            nameField.setText(model.getValueAt(row, 1).toString());
            descriptionField.setText(model.getValueAt(row, 2).toString());
            priceField.setText(model.getValueAt(row, 3).toString());
            quantityField.setText(model.getValueAt(row, 4).toString());
            categoryField.setText(model.getValueAt(row, 5).toString());
        }
    }//GEN-LAST:event_productsTableMouseClicked

    private void renderProductsTableButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_renderProductsTableButtonMouseClicked
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }//GEN-LAST:event_renderProductsTableButtonMouseClicked

    private void renderUserTableButtonMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_renderUserTableButtonMouseClicked
        DatabaseAccess.refreshTables((DefaultTableModel) usersTable.getModel(), (DefaultTableModel) productsTable.getModel());
    }//GEN-LAST:event_renderUserTableButtonMouseClicked

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton addProductButton;
    private javax.swing.JButton addUserButton;
    private javax.swing.JTextField categoryField;
    private javax.swing.JButton deleteProductsButton;
    private javax.swing.JButton deleteUserButton;
    private javax.swing.JTextField descriptionField;
    private javax.swing.JTextField emailField;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JTextField nameField;
    private javax.swing.JTextField priceField;
    private javax.swing.JPanel productsTab;
    private javax.swing.JTable productsTable;
    private javax.swing.JScrollPane productsTableScrollPane;
    private javax.swing.JTextField quantityField;
    private javax.swing.JButton renderProductsTableButton;
    private javax.swing.JButton renderUserTableButton;
    private javax.swing.JComboBox<String> roleComboBox;
    private javax.swing.JPanel rootPanel;
    private javax.swing.JButton saveProductDetailsButton;
    private javax.swing.JButton saveUserDetailsButton;
    private javax.swing.JTabbedPane tabs;
    private javax.swing.JTextField usernameField;
    private javax.swing.JPanel usersTab;
    private javax.swing.JTable usersTable;
    private javax.swing.JScrollPane usersTableScrollPane;
    // End of variables declaration//GEN-END:variables
}
