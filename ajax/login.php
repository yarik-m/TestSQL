<?php
$login = trim($_POST['login']);
$pass = trim($_POST['password']);

$error = '';
if (strlen($login) < 3)
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

$sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

if ($query->rowCount() == 0)
    echo "Такого користувача немає";
else {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    echo "Done";
}
