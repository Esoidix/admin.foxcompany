<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Создать конвой</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 500px; margin: 0 auto; }
        input, select { margin-bottom: 10px; width: 100%; padding: 8px; }
    </style>
</head>
<body>
    <h1>Создать новый конвой</h1>
    <form action="save_convoy.php" method="POST">
        <input type="text" name="name" placeholder="Название конвоя" required>
        <input type="text" name="route" placeholder="Маршрут (например, Берлин → Париж)" required>
        <input type="number" name="distance" placeholder="Дистанция (км)" required>
        
        <select name="dlc" required>
            <option value="" disabled selected>Выберите DLC</option>
            <option value="None">Без DLC</option>
            <option value="Scandinavia">Scandinavia</option>
            <option value="Iberia">Iberia</option>
        </select>
        
        <input type="datetime-local" name="parking_time" placeholder="Время парковки" required>
        <input type="datetime-local" name="departure_time" placeholder="Время выезда" required>
        <input type="text" name="server" placeholder="Сервер (например, Simulation 1)" required>
        
        <button type="submit">Создать конвой</button>
    </form>
</body>
</html>