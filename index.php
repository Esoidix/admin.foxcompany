<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: dashboard.php");
    exit;
}

// Простые логин и пароль (для примера)
$admin_login = "FoxCompanyConvoyAdmin";
$admin_password = "kD8k9i";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === $admin_login && $_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Неверный логин или пароль!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход для администратора</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 300px; margin: 0 auto; }
        input { margin-bottom: 10px; width: 100%; padding: 8px; }
    </style>
</head>
<body>
    <h2>Вход для администратора</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
    </form>
</body>
</html>