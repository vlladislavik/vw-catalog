<?php
$db = new mysqli('localhost', 'root', '', 'vw_catalog');

if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

$username = $db->real_escape_string($_POST['username'] ?? '');
$email = $db->real_escape_string($_POST['email'] ?? '');
$password = $db->real_escape_string($_POST['password'] ?? '');

if (empty($username) || empty($email) || empty($password)) {
    die("Все поля должны быть заполнены!");
}

$sql = "INSERT INTO users (username, email, password) 
        VALUES ('$username', '$email', '$password')";

if ($db->query($sql)) {
    echo "Регистрация успешна!";

    sleep(0.5);
    header("Location: lk.html");
} else {
    echo "Ошибка: " . $db->error;
}

$db->close();
?>