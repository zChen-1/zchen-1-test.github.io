// login.php
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connect to the database
  $conn = new SQLite3('users.db');

  // Check if user exists in database
  $stmt = $conn->prepare('SELECT id, name, email, password FROM users WHERE email = :email');
  $stmt->bindValue(':email', $email, SQLITE3_TEXT);
  $result = $stmt->execute();
  $row = $result->fetchArray(SQLITE3_ASSOC);

  if ($row && password_verify($password, $row['password'])) {
    // If successful, set session variables and redirect to dashboard
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    header('Location: dashboard.php');
    exit;
  } else {
    // If not, return error message
    $error = 'Invalid email or password.';
  }

  // Close the database connection
  $conn->close();
}
?>
