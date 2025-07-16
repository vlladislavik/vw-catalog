<?php
$db = new mysqli('localhost', 'root', '', 'vw_catalog');

if ($db->connect_error) {
    die("Ошибка подключения к базе данных");
}

$email = $db->real_escape_string($_POST['email']);
$password = $db->real_escape_string($_POST['password']);

$result = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

if ($result->num_rows > 0) {
    echo "Вход выполнен успешно!";
    header("Location: lk.html");
} else {
    echo "Ошибка: неверный email или пароль";
}

$db->close();
?>