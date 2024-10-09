<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $pdo->prepare('SELECT photo FROM items WHERE id = ?');
    $stmt->execute([$id]);
    $item = $stmt->fetch();

    if ($item && !empty($item['photo'])) {
        header("Content-Type: image/jpeg");
        echo $item['photo'];
        exit;
    }
}

header("Content-Type: image/png");
readfile('no-image.png');
?>