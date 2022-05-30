<?php
$title = trim($_POST['title']);
$anons = trim($_POST['anons']);
$sometext = trim($_POST['sometext']);

$error = '';
if (strlen($title) < 5)
    $error = 'Введіть назву статті, не менше 5 символів';
else if (strlen($anons) < 5)
    $error = 'Введіть анонс статті, не менше 5 символів';
else if (strlen($sometext) < 5)
    $error = 'Введіть основний текст, не менше 5 символів';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql = 'INSERT INTO article(title, anons, sometext, date, avtor) VALUES(?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $anons, $sometext, time(), $_COOKIE['login']]);

echo "Done";
