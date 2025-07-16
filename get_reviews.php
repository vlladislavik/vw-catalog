<?php
header('Content-Type: text/html; charset=utf-8');

$db = new mysqli('localhost', 'root', '', 'vw_catalog');

if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

$engine_code = $db->real_escape_string($_GET['engine_code']);

$sql = "SELECT * FROM reviews WHERE engine_code = '$engine_code' ORDER BY created_at DESC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="review">';
        echo '<p><strong>' . htmlspecialchars($row['username']) . '</strong>';
        echo ' (Оценка: ' . $row['rating'] . '/5)';
        echo '<small> ' . $row['created_at'] . '</small></p>';
        echo '<p>' . nl2br(htmlspecialchars($row['message'])) . '</p>';
        echo '</div><hr>';
    }
} else {
    echo '<p>Пока нет отзывов. Будьте первым!</p>';
}

$db->close();
?>