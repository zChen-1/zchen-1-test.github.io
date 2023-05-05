<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($users as $user) {
  list($u, $p) = explode(':', $user);
  if ($username == $u && password_verify($password, $p)) {
    $_SESSION['username'] = $username;
    header('Location: profile.php');
    exit;
  }
}

echo 'Invalid username or password.';
?>
