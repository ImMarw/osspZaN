CREATE DATABASE IF NOT EXISTS osspZaN CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE osspZaN;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    photo LONGBLOB,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO
    admins (username, password)
VALUES
    (
        'admin',
        '$2y$10$e0NRNkp5YIih3B7/FZB4UOS1Bg9vVjAiQxS.XdSWbngBV0m5Pja1W'
    );