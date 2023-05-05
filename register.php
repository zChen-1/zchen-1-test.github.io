// register.php
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Connect to the database
  $conn = new SQLite3('users.db');
  
  $sql = 'CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL
)';
$result = $conn->exec($sql);

  // Get user input
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Hash the password for security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the user data into the "users" table
  $stmt = $conn->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
  $stmt->bindValue(':name', $name, SQLITE3_TEXT);
  $stmt->bindValue(':email', $email, SQLITE3_TEXT);
  $stmt->bindValue(':password', $hashed_password, SQLITE3_TEXT);
  $result = $stmt->execute();

  // Close the database connection
  $conn->close();

  // Redirect the user to login page
  header('Location: login.php');
  exit;
}
?>
