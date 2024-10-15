<?php
session_start();
require 'config.php';

$stmt = $pdo->query('SELECT * FROM items ORDER BY timestamp DESC');
$items = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="cs">

<?php include 'head.php'; ?>

<body>
    <?php include 'navbar.php'; ?>
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
                    <div class="collumn">
                        <small>Datum nalezení: <?php echo htmlspecialchars($item['timestamp']); ?></small>
                        
                    </div>
                    <?php if ($_SESSION['admin_logged_in'] == true && isset($_SESSION['admin_username'])): ?>
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                            <input type="submit" value="Smazat">
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Žádné nalezené předměty zatím nejsou evidovány.</p>
        <?php endif; ?>
    </div>
    <?php $currentPage = 'index'; ?>
</body>

</html>