-- Build Smart WordPress Database Setup
CREATE DATABASE IF NOT EXISTS buildsmart_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'buildsmart_user'@'localhost' IDENTIFIED BY 'BuildSmart2026!';
GRANT ALL PRIVILEGES ON buildsmart_db.* TO 'buildsmart_user'@'localhost';
FLUSH PRIVILEGES;
