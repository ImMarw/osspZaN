<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Nalezené věci</title>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="lost-items.php">Nalezené věci</a>
        <a href="signin.php">Sign In</a>
        <a href="signup.php">Sign Up</a>
    </div>

    <div class="container">
        <h2>Nalezené věci</h2>
        <a href="add-item.php">Přidat nalezený předmět</a>

        <div class="items">
            <?php
            $sql = "SELECT * FROM items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p>Nalezeno: " . htmlspecialchars($row['found_date']) . "</p>";
                    if ($row['image']) {
                        echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' style='width:200px;height:200px;'/>";
                    }
                    echo "</div>";
                }
            } else {
                echo "Žádné nalezené věci.";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>