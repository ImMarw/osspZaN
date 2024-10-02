<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Zabezpečení hesla

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registrace úspěšná!";
    } else {
        echo "Chyba: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registrace</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Registrace</h2>
        <div class="form-container">
            <form action="signup.php" method="post">
                <label for="username">Uživatelské jméno</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Heslo</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Zaregistrovat se">
            </form>
        </div>
    </div>
</body>
</html>