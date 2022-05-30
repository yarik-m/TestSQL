<?php
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$login = trim($_POST['login']);
$pass = trim($_POST['password']);

$error = '';
if (strlen($username) < 2)
    $error = "Введіть ім'я";
else if (strlen($email) < 5)
    $error = 'Введіть email';
else if (strlen($login) < 3)
    $error = 'Введіть логін';
else if (strlen($pass) < 5)
    $error = 'Введіть пароль';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$salt = 'sdfh^)#4390f79sdfg3';
$pass = md5($salt . $pass);

$sql = 'INSERT INTO users(name, email, login, password) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo "Done";
