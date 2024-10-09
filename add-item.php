<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Nahrání obrázku
    $target_dir = "uploads/";
    $image = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Obrázek " . htmlspecialchars($image) . " byl úspěšně nahrán.";
    } else {
        echo "Chyba při nahrávání obrázku.";
    }

    // Uložení do databáze
    $sql = "INSERT INTO items (name, description, found_date, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $description, $date, $image);

    if ($stmt->execute()) {
        echo "Předmět byl úspěšně přidán!";
        // Přesměrování po úspěšném přidání položky
        header('Location: lost-items.php');
        exit();
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
    <title>Přidat nalezený předmět</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Přidat nalezený předmět</h2>
        <div class="form-container">
            <form action="add-item.php" method="post" enctype="multipart/form-data">
                <label for="name">Název předmětu</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Popis</label>
                <input type="text" id="description" name="description" required>
                <label for="date">Datum nálezu</label>
                <input type="date" id="date" name="date" required>

                <label for="image">Obrázek</label>
                <input type="file" id="image" name="image">

                <input type="submit" value="Přidat">
            </form>
        </div>
    </div>
    </body>
</html>