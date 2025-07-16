<?php
header('Content-Type: text/html; charset=utf-8');

$db = new mysqli('localhost', 'root', '', 'vw_catalog');

if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

$engine_code = $db->real_escape_string($_POST['engine_code']);
$username = $db->real_escape_string($_POST['username']);
$message = $db->real_escape_string($_POST['message']);
$rating = intval($_POST['rating']);

$sql = "INSERT INTO reviews (engine_code, username, message, rating) 
        VALUES ('$engine_code', '$username', '$message', $rating)";

if ($db->query($sql)) {
    header("Location: CFNA.html");
} else {
    echo "Ошибка: " . $db->error;
}

$db->close();
?>