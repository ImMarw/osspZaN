<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $signed = false;

    $sql = "SELECT `username`, `password` FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    echo $result;

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == "") {
            echo "Přihlášení úspěšné!";
            $signed = true;
        } else {
            echo "Špatné heslo!";
        }
    } else {
        echo "Uživatel neexistuje!";
    }

    $stmt->close();
    $conn->close();
    if ($signed) {
        header("Location: index.php");
    } else {
        header("Location: signin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Přihlášení</title>
</head>

<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Přihlášení</h2>
        <div class="form-container">
            <form action="" method="post">
                <label for="username">Uživatelské jméno</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Heslo</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Přihlásit se">
            </form>
        </div>
    </div>
</body>

</html>