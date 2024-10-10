<?php
session_start();
require 'config.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $photo = null;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['photo']['type'], $allowedTypes)) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        } else {
            $error = 'Povolené typy obrázků jsou JPEG, PNG a GIF.';
        }
    }

    if (empty($name)) {
        $error = 'Název předmětu je povinný.';
    }

    if (empty($error)) {
        $stmt = $pdo->prepare('INSERT INTO items (name, description, photo) VALUES (?, ?, ?)');
        try {
            $stmt->execute([$name, $description, $photo]);
            $success = 'Předmět byl úspěšně přidán.';
        } catch (Exception $e) {
            $error = 'Chyba při ukládání předmětu.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="cs">

<?php include 'head.php'; ?>

<body>
    <header>
        <?php include 'navbar.php'; ?>
        <h1 style="margin-left: 10px;">Přidat Nový Předmět</h1>
    </header>
    <div class="container">
        <?php if ($error): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color:green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form method="post" action="add_item.php" enctype="multipart/form-data">
            <label for="name">Název předmětu (povinné):</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="description">Popis předmětu (volitelné):</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>

            <label for="photo">Fotografie předmětu (volitelné):</label><br>
            <input type="file" id="photo" name="photo" accept="image/*"><br><br>

            <input type="submit" value="Přidat Předmět">
        </form>
    </div>
</body>

</html>