## PHP & MySQL Integration

### To clone this project, follow the following command:

```
//make sure to do this inside htdocs of xampp or www directory of wamp.
git clone https://github.com/genmancoder/web_app.git
cd web_app
```

### Create a new branch itp-acts-yourlastname using itp-acts branch.

```git checkout -b itp-acts-paulin itp-acts```

### Start working with activities

#### PHP-Act-1 - Basic Syntax and Variables, Control Structures

* Write a PHP script to declare variables of different data types (string, integer, float, boolean) and perform arithmetic operations on them.

* Create a PHP script that takes a user's age as input. Use if-else statements to determine if the user is a minor, adult, or senior citizen. Print or display feedback.

#### PHP-Act-2 - Functions and Arrays

* Write a function in PHP to calculate the factorial of a given number using recursion.

* Create an indexed array of student names. Use a loop to print each student's name on a new line. 

#### PHP-Act-3 - HTML Forms

* Create an HTML form with fields for username and password. Write a PHP script to validate the form data and display a message indicating whether the login was successful or not.

#### PHP-Act-4 - Working with Files

* Create a text file named data.txt in the same directory as your PHP script.
* Populate the text file with some sample data, such as names, ages, or any other information you'd like to work with.
* Write a PHP script to open the data.txt file for reading.
* Read the contents of the file line by line and display them on the web page.
* Create an HTML form with fields for adding new data (e.g., name, age).
* Write a PHP script to process the form submission.
* Append the new data to the data.txt file.
* After writing new data to the file, display the updated contents of data.txt on the web page.

#### PHP-Act-5 - Working with Files

* Set up a MySQL database with a table named "users" containing fields for id, username, and email. Write PHP scripts to connect to the database and perform CRUD operations on the "users" table.

#### Project Work (Midterm)

* Develop a simple CRUD application for managing a list of any two (2) related entities listed below. The application should allow users to add, edit, delete, and view contact information stored in a MySQL database.

- User

`Attributes: ID, Username, Email, Password, Role, Registration Date`

- Product

`Attributes: ID, Name, Description, Price, Quantity, Category`

- Customer

`Attributes: ID, First Name, Last Name, Email, Phone Number, Address`

- Order

`Attributes: ID, Customer ID, Order Date, Total Price, Status`

- Article

`Attributes: ID, Title, Content, Author, Publication Date, Category`

- Employee

`Attributes: ID, First Name, Last Name, Email, Phone Number, Department, Position`

- Task

`Attributes: ID, Title, Description, Assigned To, Due Date, Status`

- Event

`Attributes: ID, Title, Description, Date, Location, Organizer`

- Book

`Attributes: ID, Title, Author, ISBN, Publisher, Publication Date`

- Advertisement

`Attributes: ID, Title, Description, Image URL, Start Date, End Date`

- Comment

`Attributes: ID, Post ID, Author, Content, Date`

- Forum Thread

`Attributes: ID, Title, Author, Content, Date, Category`

- Invoice

`Attributes: ID, Customer ID, Date, Total Amount, Status`

- Project

`Attributes: ID, Title, Description, Start Date, End Date, Status`

- Course

`Attributes: ID, Title, Description, Instructor, Duration, Price`

- Recipe

`Attributes: ID, Title, Author, Description, Ingredients, Instructions`

- Ticket

`Attributes: ID, Title, Description, Assigned To, Priority, Status`

- Contact

`Attributes: ID, First Name, Last Name, Email, Phone Number, Address`

- Poll

`Attributes: ID, Question, Options, Start Date, End Date, Results`

- Review

`Attributes: ID, Product ID, Author, Rating, Comment, Date`