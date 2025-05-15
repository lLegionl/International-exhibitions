<?php
// Конфигурация БД
define('DB_HOST', 'MySQL-8.2');
define('DB_USER', 'root'); // Замените на своего пользователя
define('DB_PASS', '');     // Замените на свой пароль
define('DB_NAME', 'international_exhibitions');

// Подключение к БД
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}

// Старт сессии
session_start();
?>