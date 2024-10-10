<?php
// index.php
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
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Jak to funguje?</h2>
        <p>Pokud jste něco ztratili, můžete se podívat na seznam nalezených předmětů. Administrátoři mohou přidávat nové
            položky do databáze.</p>
    </div>
    <?php $currentPage = 'index'; ?>
</body>

</html>