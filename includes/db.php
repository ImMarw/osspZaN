<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "osspZaNtest";

global $conn;

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    echo "Connected successfully";
} catch (mysqli_sql_exception $e) {
    echo "Connection failed: " . $e->getMessage();
}