<?php
session_start();
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    echo $admin['password'];

    if ($admin && (password_verify($password, $admin['password'])) || ($password == $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: add_item.php');
        exit;
    } else {
        $error = 'Nesprávné uživatelské jméno nebo heslo.';
    }
}
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OsspZaN - Ztráty a Nálezy</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Přihlášení Administrátora</h1>
    </header>
    <nav>
        <a href="index.php">Domů</a>
        <a href="items.php">Nalezené Předměty</a>
        <a href="login.php">Administrace</a>
    </nav>
    <div class="container">
        <?php if ($error): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Uživatelské jméno:</label><br>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Heslo:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Přihlásit se">
        </form>
    </div>
</body>

</html>