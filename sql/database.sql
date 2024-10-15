CREATE DATABASE IF NOT EXISTS osspZaN CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE osspZaN;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    photo LONGBLOB,
    claimed BOOLEAN DEFAULT FALSE,
    claimed_timestamp TIMESTAMP,
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
    ('admin', 'osspZaNadmin');

INSERT INTO
    admins (username, password)
VALUES
    (
        'admin1',
        '$2y$10$SRVN2rVCMUFAqRpIMK4avushxDVDnKaATFubxzyXj0d2duyUGQLsO'
    );

    

use osspZaN;

SHOW VARIABLES LIKE 'event_scheduler';

SET
    GLOBAL event_scheduler = ON;

CREATE EVENT IF NOT EXISTS delete_old_items ON SCHEDULE EVERY 1 DAY DO BEGIN
DELETE FROM
    items
WHERE
    claimed_timestamp < NOW() - INTERVAL 20 DAY
    OR timestamp < NOW() - INTERVAL 1 YEAR
END;