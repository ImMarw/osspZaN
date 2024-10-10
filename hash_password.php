<?php
$password = 'osspZaNadmin';
$hash = password_hash($password, PASSWORD_DEFAULT);
echo "Hash hesla '{$password}' je: {$hash}";
?>