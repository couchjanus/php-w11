<?php

// Общие настройки

// Устанавливаем временную зону по умолчанию
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('Europe/Kiev');    
}

// Ошибки и протоколирование
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL | E_NOTICE | E_STRICT | E_DEPRECATED);

require_once realpath(__DIR__).'/../config/app.php';

require_once CORE.'Helper.php';
require_once CORE.'View.php';
require_once CORE.'Connection.php';

$connection = Connection::connect(require_once DB_CONFIG_FILE);

// $connection = new Connection(require_once DB_CONFIG_FILE);

// if (!$connection) {
//     echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//     exit;
// }
// echo "Соединение с MySQL установлено!" . PHP_EOL;

// $stmt = Connection::query("SELECT * FROM categories ORDER BY id ASC");
// $stmt = $connection->pdo->query("SELECT * FROM categories ORDER BY id ASC");
// $categories = $stmt->fetchAll(PDO::FETCH_CLASS);

// var_dump($categories);

require_once CORE.'Controller.php';
require_once CORE.'Router.php';
