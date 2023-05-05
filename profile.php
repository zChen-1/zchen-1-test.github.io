<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location: login.html');
  exit;
}

$username = $_SESSION['username'];

echo "<h1>Welcome, $username!</h1>";
echo "<p>Your email is: $email.</p>";
?>
