// dashboard.php
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Welcome to your dashboard, <?php echo $_SESSION['name']; ?></h1>
    <p>You are logged in as <?php echo $_SESSION['email']; ?></p>
    <a href="logout.php">Logout</a>
  </body>
</html>
