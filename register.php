<?php
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

$file = fopen('users.txt', 'a');
fwrite($file, "$username:$password:$email\n");
fclose($file);

echo 'Registration successful!';
?>
