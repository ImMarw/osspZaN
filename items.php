<?php
// items.php
require 'config.php';

// Fetch all items
$stmt = $pdo->query('SELECT * FROM items ORDER BY timestamp DESC');
$items = $stmt->fetchAll();
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
        <h1>Nalezené Předměty</h1>
    </header>
    <nav>
        <a href="index.php">Domů</a>
        <a href="items.php">Nalezené Předměty</a>
        <a href="login.php">Administrace</a>
    </nav>
    <div class="container">
        <?php if (count($items) > 0): ?>
            <?php foreach ($items as $item): ?>
                <div class="item">
                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                    <?php if (!empty($item['description'])): ?>
                        <p><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($item['photo'])): ?>
                        <img src="image.php?id=<?php echo $item['id']; ?>"
                            alt="Foto <?php echo htmlspecialchars($item['name']); ?>">
                    <?php endif; ?>
                    <small>Datum nalezení: <?php echo htmlspecialchars($item['timestamp']); ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Žádné nalezené předměty zatím nejsou evidovány.</p>
        <?php endif; ?>
    </div>
</body>

</html>