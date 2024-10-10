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

<?php include 'head.php'; ?>

<body>
    <?php include 'navbar.php'; ?>
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
    <?php $currentPage = 'index'; ?>
</body>

</html>