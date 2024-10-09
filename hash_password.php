<?php
$password = 'pavel';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Hash hesla '{$password}' je: {$hash}";
?>