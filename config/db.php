<?php
 /**
 * Данные для подключения к БД
 */

return [
        'db' => [
            'driver' => DRIVER,
            'dbname' => DBASE,
            'host'    => HOST,
            'charset' => CHARSET,
        ],
        'user' => USER,
        'password' => PASSWORD,
        'errmode' => PDO::ERRMODE_EXCEPTION,
        'options' => [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
];