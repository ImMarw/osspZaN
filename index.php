<!DOCTYPE html>
<html lang="cs">

<?php 
include 'head.php';
session_start();
?>

<body>
    <?php
    include 'navbar.php';
    include 'showMeSession.php';
    ?>
    <div class="container">
        <h2>Jak to funguje?</h2>
        <p>Pokud jste něco ztratili, můžete se podívat na seznam nalezených předmětů. Administrátoři mohou přidávat nové
            položky do databáze.</p>
    </div>
    <?php $currentPage = 'index'; ?>
</body>

</html>