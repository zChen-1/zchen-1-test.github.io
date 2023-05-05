// dashboard.php
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
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
    <h1>Welcome to your dashboard, <?php echo $_SESSION['email']; ?></h1>
    <a href="logout.php">Logout</a>
  </body>
</html>
