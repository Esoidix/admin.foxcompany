<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $convoy_data = [
        'name' => $_POST['name'],
        'route' => $_POST['route'],
        'distance' => $_POST['distance'],
        'dlc' => $_POST['dlc'],
        'parking_time' => $_POST['parking_time'],
        'departure_time' => $_POST['departure_time'],
        'server' => $_POST['server']
    ];

    // Сохраняем в файл (или БД)
    file_put_contents('convoys.json', json_encode($convoy_data, JSON_PRETTY_PRINT));
    echo "<p style='color:green;'>Конвой успешно создан!</p>";
    echo "<a href='create_convoy.php'>Создать ещё</a>";
}
?>