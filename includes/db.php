<?php
$servername = "localhost"; // nebo 127.0.0.1
$username = "root"; // uživatelské jméno MySQL
$password = "root"; // heslo k MySQL
$dbname = "osspZaNtest"; // název databáze

// Vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}
?>